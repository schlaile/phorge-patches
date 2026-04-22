# Draft: Upstream Task for Calendar Context Layers

This is a local draft for a possible upstream Maniphest task on `we.phorge.it`.
It is intentionally not sent yet.

## Proposed Title

Introduce layered calendar context providers for non-event time metadata

## Draft Task Text

Phorge Calendar currently models visible time information primarily as normal
calendar events or imported ICS data.

This works for meetings and similar objects, but it is a poor fit for other
types of useful calendar information which are not really "events", such as:

- public holidays
- office or site opening hours
- core presence windows
- site closures or operating hours

These are better understood as contextual calendar layers than as normal
objects with transactions, policies, mail, and edit history.

### Problem

Today, administrators who want to show information like public holidays have
very limited options:

- import external ICS feeds
- create normal calendar events
- patch rendering ad hoc

All of these approaches have drawbacks:

- ICS imports are generic and do not model holidays or business hours
  explicitly
- normal events introduce object semantics which may not make sense for
  derived or deterministic information
- rendering-only hacks do not generalize well

This is especially limiting for installations which need per-user or per-site
calendar context, for example:

- users in different German federal states with different public holidays
- different office opening hours by location
- presence or core hours which should be visible in day view

### Proposal

Introduce a small framework for **layered calendar context providers**.

These providers would:

- receive the viewer and visible time range
- return non-persisted render data for contextual time information
- allow calendar views to display such information separately from normal
  events

Context items should support different scopes or origins, for example:

- `viewer`: context derived from the viewer, such as region-specific holidays
- `site`: context derived from a work location or office
- `event`: context derived from an event location
- `global`: context which applies to everyone

This is important because multiple kinds of context may overlap on the same
day. For example:

- a user may belong to a site in Baden-Wurttemberg
- the user may attend an event in Rheinland-Pfalz
- holidays and business hours may therefore differ depending on whether the
  calendar is showing personal context or event-location context

The calendar should be able to render these as distinct contextual layers
instead of forcing them into a single event-like model.

Initial use cases:

1. public holidays
2. business hours / office opening hours

### Expected Benefits

- avoids modeling derived time metadata as normal calendar events
- supports viewer-specific, site-specific, or event-specific context
- enables better UI treatment for holidays and business hours
- creates a reusable abstraction for future non-event calendar overlays

### Possible Scope for a First Iteration

- add a generic provider interface
- support rendering context items in month and day view
- implement a first provider for public holidays
- optionally use user settings or profile metadata to choose a region or site

To keep the first version small, the initial implementation could support only
`viewer` scope, while designing the framework so `site` and `event` scope can
be added later.

### Notes

This is not primarily a request for a holiday feature. The more general need is
support for layered non-event temporal context in calendar rendering.

Holidays are just the first obvious example.

## Rationale for Local Draft

Before filing this upstream, we likely want:

- a clearer local implementation direction
- a decision on persisted events vs. render-time context items
- at least a minimal proof of concept
