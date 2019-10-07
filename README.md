# Lending Slip Printer for ALMA

## Introduction

This web-based lending slip printer allows patron to select the lending slip reports (XML files) and print them

## Requirements

This web-based application requires:

* [1D Barcode Bakery Package](https://www.barcodebakery.com/en/1d/php)

In case you don't purchase the above 1D Barcode Bakery Package for your server and use your own barcode library to procedure the scannale barcode in lending slip, change your code at lines 172 and 179 in print.php: 

https://github.com/simonhm/alma_lending_slip_printer/blob/df1125081849990d195095590826186a6dc4f6f6/print.php#L172
https://github.com/simonhm/alma_lending_slip_printer/blob/df1125081849990d195095590826186a6dc4f6f6/print.php#L179
       
## Maintainers/Sponsors

Current maintainers:

* [Simon H Mai](https://github.com/simonhm)
* Sonja Eilertson (documentation)

## License

[GPLv3](http://www.gnu.org/licenses/gpl-3.0.txt)
