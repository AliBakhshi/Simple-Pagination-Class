# Simple-Pagination-Class
Simple PHP Pagination Class

# How To Use

```
$pagination = new Pagination();
$pagination->count = 6; // Number Of Posts Per Page
$pagination->total = 100; // Number Of Total Posts (SELECT COUNT(*) AS count FROM posts)
$pagination->url = www.domain.com?action=news&page= // Address Of All Posts With $_GET['page'] 
$pagination->view(); // View Pagination With Bootstrap Html
