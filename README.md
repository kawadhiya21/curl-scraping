curl-scraping
=============

A script which curls a website and gets important information.

I wrote this for data analysis and comparison shopping purpose.

The data gets stored in following table.

CREATE TABLE IF NOT EXISTS `crossword_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `publisher` text NOT NULL,
  `isbn` text NOT NULL,
  `ean` text NOT NULL,
  `binding` text NOT NULL,
  `numberofpages` text NOT NULL,
  `image` text NOT NULL,
  `language` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3621 ;


In req.php :
Just configure the db settings.
Also set the page link in $url.
Enter the category $category.

Execute curl.php on command-line .


