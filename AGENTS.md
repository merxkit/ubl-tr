# AGENTS.md

Guidance for AI coding agents working in this repository.

## Project

`merxkit/ubl-tr`: framework-agnostic PHP library that builds and validates UBL-TR documents (Turkish e-Fatura / e-Arşiv) offline. Namespace `Merxkit\UblTr\`, PHP ^8.3.

## Commands

- `composer check`: coding standard, static analysis and tests; must pass before committing.
- `composer test`, `composer analyse` (PHPStan level max + strict rules), `composer cs` / `composer cs:fix` (PER-CS 2.0).

## Layout

Code is split by document, not by layer.

- `src/Invoice/`: Invoice document models, builder and XML serializer.
- `src/Calculation/`: optional tax and total calculation, kept separate from the builder.
- `src/Validation/`: XSD validation and the schematron engine abstraction.
- `src/Gib/`: metadata and resource paths for the bundled GİB package.
- `resources/gib/<package-date>/`: bundled GİB XSD and transpiled schematron.
- `tools/`: maintainer scripts (GİB package update, schematron transpilation); not shipped.
- `tests/Unit`, `tests/Integration`, `tests/Fixtures`.

## Constraints

- Runtime must stay offline and depend only on `ext-dom`, `ext-libxml`, `ext-xsl` and `brick/math`. No HTTP clients; Integrator adapters live in separate packages.
- Never use floats for money or quantities; use `brick/math`.
- Every class is `final` and every file declares `strict_types`.
