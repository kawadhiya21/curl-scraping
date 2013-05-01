<?php

include("req.php");
include("simple_html_dom.php");
$count = 0;
$index = 1;
while($count <= 4000)
{
$curlurl = '';
$count = $count + 16;
$curlurl = $url.$index;
$index++;
while(!$fcurl = file_get_html($curlurl))
	{
		$pk = 2;
	}


$nodes = $fcurl->find('span');

foreach($nodes as $a)
	{
	$k = $a->class;
	if($k == 'variant-title')
		{
		$link = $a->children(0)->href;
		while(!$scurl = file_get_html('http://www.crossword.in'.$link))
			{
			$pk = 2;	
			}
		$name = $scurl->find('div[id=features]');
		foreach($name as $n)
			{
			$loop = 0;
			$attr_array = array( 
				'title' => '' , 
				'author' => '' , 
				'publisher' => '' , 
				'isbn' => '' , 
				'ean' => '' , 
				'binding' => '' , 
				'numberofpages' => '' , 
				'image' => '' ,
				'language' => '' , 
				'description' => '',
				'category' => $category);
			while($n->children(1)->children($loop)->innertext)
				{
				$attr = $n->children(1)->children($loop)->children(0)->innertext;
				$dum_val = $n->children(1)->children($loop)->innertext;
				$p = explode(':' , $dum_val , 2);
				$final_attr = trim($attr); 
				$final_attr = strtolower($final_attr);
				$final_attr = str_replace(' ' , '' , $final_attr);
				$final_value = trim($p[1]);
				$loop ++ ;
				$attr_array[$final_attr] = $final_value;
				}
			$img = $scurl->find('a[href=#]');
				foreach($img as $i)
					{
					$kk = $i->attr;		
					$attr_array['image'] = $kk['data-medium-url'];
					}
			$desc = $scurl->find('div[id=description]');
			foreach($desc as $d)
				{
				$desci = $d->innertext;
				$desc_val = explode('</h3>',$desci);
				$attr_array['description'] = trim($desc_val[1]);
				}	
			$loop = 0;
			$columns = implode(",",array_keys($attr_array));
			$escaped_values = array_map('mysql_real_escape_string', array_values($attr_array));
			$values  = implode("\",\"", $escaped_values);
			$sql = "INSERT INTO crossword_data ($columns) VALUES (\"".$values."\");";
			$klpd = mysql_query($sql);
			if(!$klpd)
				{
				echo mysql_error();
				die();
				}
			if($klpd)
				{
				echo "Inserted for book   ".$attr_array['title']."\n";
				}
			
			}
				
		
		}
	}
}




?>
