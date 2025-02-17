# Lending Slip Printer for ALMA

## Introduction

This web-based lending slip printer allows library staff to select the lending slip reports (XML report files downloading from ALMA) and print them.

## Requirements

This web-based application requires:

* [1D Barcode Bakery Package](https://www.barcodebakery.com/en/1d/php)

In case you don't purchase the above 1D Barcode Bakery Package for your server and use your own barcode library to procedure the scannable barcode in lending slip, replace your code at lines [172](https://github.com/simonhm/alma_lending_slip_printer/blob/df1125081849990d195095590826186a6dc4f6f6/print.php#L172) and [179](https://github.com/simonhm/alma_lending_slip_printer/blob/df1125081849990d195095590826186a6dc4f6f6/print.php#L179) in print.php
       
## Maintainers/Sponsors

Current maintainers:

* [Simon H Mai](https://github.com/simonhm)
* Sonja Eilertson (documentation)

## License

[GPLv3](http://www.gnu.org/licenses/gpl-3.0.txt)
