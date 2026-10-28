# merxkit/ubl-tr

Framework-agnostic PHP library to **build** and **validate** UBL-TR documents for Turkish **e-Fatura** and **e-Arşiv** invoices.

- **Offline:** no network access, no contract, no test account. Validation runs locally.
- **Stock PHP:** XSD validation via `ext-dom`, GİB schematron validation via `ext-xsl` (GİB's XPath 2.0 rules are transpiled to XSLT 1.0).
- **Integrator-independent:** produces and checks the XML; transmitting it is left to your Integrator. Adapters (Nilvera, QNB eFinans, Sovos, ...) will ship as separate packages.

> **Status: pre-alpha.** The package skeleton exists; the public API does not yet. Do not use in production.

> [!WARNING]
> **Disclaimer — not tax advice.** This library is provided "as is", without warranty of any kind (see [LICENSE](LICENSE)). Passing XSD and schematron validation does **not** mean a document is correct under Turkish tax law. VAT (KDV), withholding (tevkifat), exemption and any other amounts are your responsibility: verify them with a certified accountant (SMMM/YMM) or tax advisor. The authors accept no liability for rejected documents, penalties or any other loss arising from its use.
>
> **Sorumluluk reddi — vergi danışmanlığı değildir.** Bu kütüphane "olduğu gibi" ve hiçbir garanti verilmeden sunulur. Bir belgenin XSD ve schematron doğrulamasından geçmesi, Türk vergi mevzuatına uygun olduğu anlamına **gelmez**. KDV, tevkifat, istisna ve diğer tüm tutarların doğruluğu kullanıcının sorumluluğundadır; mali müşavirinize (SMMM/YMM) danışın. Kullanımdan doğabilecek ret, ceza veya herhangi bir zarardan geliştiriciler sorumlu tutulamaz.

## Scope

| In scope | Out of scope |
| --- | --- |
| Invoice document, e-Fatura (`TEMELFATURA`, `TICARIFATURA`) and e-Arşiv (`EARSIVFATURA`) profiles | Signing (XAdES / mali mühür): your Integrator signs, or you sign yourself |
| XSD validation | Sending documents to GİB or an Integrator (separate adapter packages) |
| GİB schematron validation | PDF/HTML rendering |
| Optional tax and total calculation | Other documents (e-İrsaliye, ...) for now |

## Requirements

- PHP 8.3 or newer
- `ext-dom`, `ext-libxml`, `ext-xsl`

## Installation

```bash
composer require merxkit/ubl-tr
```

## GİB package

Each release bundles exactly one GİB Package (XSD + schematron) and states its date in the [CHANGELOG](CHANGELOG.md). GİB updates its rules several times a year; an update ships as a minor release, so keep the library up to date.

GİB publishes these files without an explicit licence. They are redistributed with attribution (see [NOTICE](NOTICE)) and are not covered by this project's MIT licence.

## Development

```bash
composer install
composer check   # cs + analyse + test
composer cs:fix
```

## License

MIT, see [LICENSE](LICENSE). Third-party material is listed in [NOTICE](NOTICE).
