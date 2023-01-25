<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Save scanner input

Method accepts request sent by barcode scanner (see above). Only full and as correct as possible data should be saved (
all fields are required, types are checked, year is in correct range, etc.). Propose and implement HTTP response that
this method will return for scanner LED.
<pre>
    POST /v1/scan
    Content-Type: application/json
    Accept: application/json
    {"isbn": int, "author_full_name": string, "title": string, "year": int}
</pre>

## Get authors top 100

Method doesn't accept any parameters. Should return 100 items, where each item should contain author name and number of
books written by this author, sorted by number of books in descending order.
<pre>
    GET /v1/author/top-100
    Content-Type: application/json
    Accept: application/json
</pre>

## Get books by author

Method accepts author name. Should return all books written by this author. Each item should contain at least book
title, ISBN and time of adding to database.
<pre>
    POST /v1/author/search
    Content-Type: application/json
    Accept: application/json
    {"name": string}
</pre>

## Get books in a range of years
Method accepts one or two parameters that specify years range. Year parameter that is not  specified means -Infinity/+Infinity. Method should return books from that year range. Each  item should contain at least book title, ISBN and author name.
<pre>
    GET /v1/books/list
    Content-Type: application/json
    Accept: application/json
    {"year": string, nullable, format: 2022-2034}

</pre>

