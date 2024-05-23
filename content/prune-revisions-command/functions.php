<?php

use BookStack\Entities\Models\Page;
use BookStack\Facades\Theme;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

// Define the command we want to add to BookStack
class PruneRevisionsCommand extends Command
{
    // Specify how the command should be called, and the description that'll show for it
    protected $signature = 'bookstack:prune-revisions {bookslug} {pageslug}';
    protected $description = 'Remove revisions without changelog and reset numbers for a specific page';

    // Define the function that'll be called when the command is performed
    public function handle(): int
    {
        $pageSlug = $this->argument('pageslug');
        $bookSlug = $this->argument('bookslug');

        // Find the provided page using slugs
        $page = Page::query()->whereHas('book', function (Builder $query) use ($bookSlug) {
            $query->where('slug', '=', $bookSlug);
        })->where('slug', '=', $pageSlug)->first();

        // Return as an error if the page is not found
        if (!$page) {
            $this->error("Page of slugs {$bookSlug}:{$pageSlug} not found");
            return 1;
        }

        // Delete revisions without changelog, except if it's the current revision
        $currentRevision = $page->currentRevision()->first();
        $deleteCount = $page->allRevisions()
            ->where('type', '=', 'version')
            ->where('summary', '=', '')
            ->where('id', '!=', $currentRevision->id)
            ->delete();

        // Reset numbers on the revisions
        $revisions = $page->allRevisions()->where('type', '=', 'version')
            ->orderBy('created_at', 'asc')
            ->get()
            ->all();
        foreach ($revisions as $index => $revision) {
            $revision->revision_number = $index + 1;
            $revision->save();
        }

        // Update page revision count
        $page->revision_count = count($revisions);
        $page->save();

        $this->line("Revisions pruned and re-numbered for page [{$page->name}] with {$deleteCount} revisions deleted");

        return 0;
    }
}

// Register our command via the theme system
Theme::registerCommand(new PruneRevisionsCommand());
