# BookStack Hacks

This repository contains the hacks that are shown on the [/hacks part of the website](https://www.bookstackapp.com/hacks/). This is not a website in itself,
but it designed to be a submodule within the `hacks/` directory of the [BookStack website repo](https://github.com/BookStackApp/website).

### Hack Update Service

As a way to sustainably maintain hacks, a hack update service is advertised on hack pages which allows people to pay a one-off fee to request an update of a hack to work with the latest release of BookStack.
This service is provided by [HTTP Functions Ltd](https://www.httpfunctions.com/).

### Support & Issues

Hacks in this repo are unsupported, maybe become out-of-date and do not receive active maintenance unlike the core BookStack codebase. 

Feel free to raise an issue for bugs or incorrect content but **please do not open issues for**:

- Requesting new hacks, or variations of existing hacks.
- Guidance/support for implementing, using or maintaining hacks.
- Issues when using hacks on BookStack versions they're not lasted tested for.
- Providing details to update a hack (Open a PR instead).
- Limitations in existing hacks.

### Contributions & Scope

Contributions are welcome to this repository but the scope for additions will be relatively strict to keep maintenance dept minimal. Please don't assume any customizations/hacks will be accepted here. The scope will be as follows:

- There should be minimal overlap with an existing hack.
- The hack should have a relatively minimal surface area.
- The hack should have a reasonably low chance of conflicting with future updates.
- The hack should have a low likelihood of inadvertently causing additional problems.
- Hacks should not have external platform-specific requirements.

Pull requests to update hacks for more recent compatibility are welcome, as long as they don't apply additional non-required changes.

Contributions will become under the MIT license of the project.