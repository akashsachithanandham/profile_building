<?php
/**
 * phpCV - PHP Curriculum Vitae
 * Made by Pierre Mavro
 * phpCV is under GPLv2 License

 * Initial project : http://sampleresumetemplate.net/
 
 * Sample Resume Template was written in XHTML. I've made some changes to make it :
 * - Dynamic
 * - Bi language
 * - With a confidential part
 * - Auto calcul age from birth date 
 * - Generate PDF on the fly
**/

// phpCV version
$version = "0.1";

// Secret keyword to show Full CV
$secret = 'mysecret';

// Get lang and if full CV is required
list ($lang, $fullcv, $pdf, $exclude) = lang_and_fullcv($secret); //Do not remove this line

// Configuration file
include "config.php";

// Look if requested full CV or standart
function lang_and_fullcv($secret)
{
	// Get requested language
	if (preg_match('/fr/i', $_SERVER['QUERY_STRING']))
	{
		$lang='en';
	}
	else
	{
		$lang='en';
	}

	// Get if full CV (with phone number, year etc... is requested)
    if ($secret)
    {
    	if (preg_match("/$secret/i", $_SERVER['QUERY_STRING']))
    	{
    		$fullcv=1;
    	}
    	else
    	{
    		$fullcv=0;
    	}
    }
    else
    {
        $fullcv=0;
    }

    // Check if this request a PDF format
	if (preg_match('/pdf/i', $_SERVER['QUERY_STRING']))
	{
		$pdf=1;
	}
	else
	{
		$pdf=0;
	}
	
    // Check if this request is asking to generate the PDF format
	if (preg_match('/exclude/i', $_SERVER['QUERY_STRING']))
	{
		$exclude=1;
	}
	else
	{
		$exclude=0;
	}
	
	// Return lang and full CV
	return array ($lang, $fullcv, $pdf, $exclude);
};

// Generate a PDF version
function push_pdf_version($lang,$fullcv,$wkhtmltopdf_bin,$options,$site,$pdf_destination,$pdf_filename,$my_name,$exclude)
{
    // Replace generated PDF filename by firstname_second_name.pdf if $pdf_filename is unset
    if (!$pdf_filename)
    {
        $pdf_filename = str_replace(' ', '_', $my_name . '-cv_' . $lang . '.pdf');
        $pdf_filename = strtolower($pdf_filename);
    }

    // Detect if needed full cv or not
    if ($fullcv == 0)
    {
    	if ($exclude == 0)
    	{
           echo $wkhtmltopdf_bin;
           echo $options;
           echo $site;

    		exec("$wkhtmltopdf_bin $options $site" . '?' . "$lang $pdf_destination" . '/' . "$pdf_filename");
    	}
        else
        {
        	exec("$wkhtmltopdf_bin $options $site" . '?' . "$lang" . '_exclude' . " $pdf_destination" . '/' . "$pdf_filename");
    	}
    }
    else
    {
    	if ($exclude == 0)
    	{
    		exec("$wkhtmltopdf_bin $options $site" . '?' . "$lang" . '_full' . " $pdf_destination" . '/' . "$pdf_filename");
    	}
        else
        {
        	exec("$wkhtmltopdf_bin $options $site" . '?' . "$lang" . '_full_exclude' . " $pdf_destination" . '/' . "$pdf_filename");
        }
    }

    // Create PDF page to make it downloadable
    header("Content-type: application/pdf");
    header("Content-Disposition: attachment; filename=" . $pdf_filename);
    readfile("$pdf_destination/$pdf_filename");
    unlink($pdf_destination . '/' . $pdf_filename);
}

// HTML Header
function cv_header($lang,$title,$version,$my_name)
{
	print <<<_HTML_
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>$title</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- Generated with phpCV v$version, made by Pierre Mavro -->

	<meta name="generator" content="phpCV v$version" />
	<meta name="keywords" content="CV, Curriculum Vitae, $my_name" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="resume.css" media="all" />
	<style>
	.one{
		font-size: 24px;
	}
	</style>

</head>
<body>

_HTML_;
};

// Calcul Age
function birth_years_old($my_birth_day,$my_birth_month,$my_birth_year)
{
	$today['day'] = date('j');
	$today['month'] = date('n');
	$today['year'] = date('Y');
	$my_age = $today['year'] - $my_birth_year;
	if ($today['month'] <= $my_birth_month)
	{
	    if ($my_birth_month == $today['month'])
	    {
			if ($my_birth_day > $today['day'])
			{
				$my_age--;
			}
		}
    	else
    	{
				$my_age--;
		}
	}
	return $my_age;
}

// Name, Logo, Personnal informations
function cv_name($fullcv,$my_name,$role,$personnal_infos,$personnal_infos_full)
{
	print <<<_HTML_
	<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1 class="one">$my_name</h1>
					
				</div>

				<div class="yui-u">
					<div class="contact-info">

_HTML_;

	// Private full CV is required
	if ($fullcv == 1)
	{
		foreach ($personnal_infos_full as $line)
		{
	    	print "\n\t\t\t\t\t\t<h3 align=\"center\">" . $line . "</h3>";
		}
	}

	// Public personnal Infos
	foreach ($personnal_infos as $line)
	{
		print "\n\t\t\t\t\t\t<h5 align=\"center\">" . $line . "</h5>\n";
	}

	// Ending
	print <<< _HTML_
					</div>
				</div>
			</div>
		</div>

_HTML_;
}

function main_start()
{
print <<< _HTML_
		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

_HTML_;
}

function cv_profile($profile_title,$career)
{
	print <<< _HTML_
					<div class="yui-gf">

						<div class="yui-u first">
							<h3>$profile_title</h3>
						</div>
						<div class="yui-u">
							<p class="enlarge">
							$career
							</p>
						</div>
					</div>

_HTML_;
}

function cv_contact($cno,$cad)
{
	print <<< _HTML_
					<div class="yui-gf">

						<div class="yui-u first">
							<h3>Personal Information:</h3>
						</div>
						<div class="yui-u">
							
							\t\t\t\t\t\t\t<li>Address : $cad<br></li><li>Contact No : $cno</li><br>

							
						</div>
					</div>

_HTML_;
}



function cv_aim($aim_title,$othertech)
{
	print <<< _HTML_
					<div class="yui-gf">
						<div class="yui-u first">
						<h3>$aim_title</h3>
					</div>
						<div class="yui-u">
							<p class="enlarge">
_HTML_;			
							
print "\t\t\t\t\t\t\t<ul class=\"talent\">\n";
	$num_knowledges = count($othertech);
	$i=1;
	foreach ($othertech as $line)
	{
		if ($i < $num_knowledges)
		{
			print "\t\t\t\t\t\t\t<li>" . $line . "</li>\n";
		}
		else
		{
			print "\t\t\t\t\t\t\t<li class=\"last\">" . $line. "</li>\n";
		}
		$i++;
	}
	print "\t\t\t\t\t\t\t</ul>\n\n";
	print <<< _HTML_
	</p>

						</div>
					</div>

_HTML_;


}

function cv_skills($skills_name,$skill1,$skill2,$skill3)
{
	print <<< _HTML_
						<div class="yui-gf">
						<div class="yui-u first">
							<h3>$skills_name</h3>
						</div>
						<div class="yui-u">
								<div class="talent">
									<h3>$skill1</h3>
									
								</div>

								<div class="talent">
									<h3>$skill2</h3>
									
								</div>

								<div class="talent">
									<h3>$skill3</h3>
									
								</div>
						</div>
					</div>

_HTML_;
}

function cv_project($project_name, $project_duration, $project_objective, $project_tools, $project_outcome )
{
	print <<< _HTML_
					<div class="yui-gf">
						<div class="yui-u first">
						<h3>Project</h3>
					</div>
						<div class="yui-u">
							<p class="enlarge">
_HTML_;			
							
print "\t\t\t\t\t\t\t<ul class=\"talent\">\n";
	$num_knowledges = count($project_name);
	//$i=0;
	//foreach ( $project_name, $project_duration, $project_objective, $project_tools, $project_outcome as $line, $line1,$line2,$line3,$line4)
	for($i=0;$i<$num_knowledges;$i++)
	{
		if ($i < $num_knowledges - 1 )
		{
			print "\t\t\t\t\t\t\t<li>" ."<strong>Topic:</strong> \t" .$project_name[$i] ."<br>"."<strong>Duration:</strong> \t" . $project_duration[$i]. "<br>"."<strong>Objective:</strong> \t" .$project_objective[$i]. "<br>"."<strong>Tools and Techniques:</strong> \t" .$project_tools[$i]. "<br>"."<strong>Outcome:</strong> \t" .$project_outcome[$i]. "</li><br>\n";
		}
		else
		{
			//print "\t\t\t\t\t\t\t<li class=\"last\">" . $line. "</li>\n";
			//print "\t\t\t\t\t\t\t<li class=\"last\">" . $line ."\n". $line1. "\n".$line2. "\n".$line3. "\n".$line4 "</li>\n";
			print "\t\t\t\t\t\t\t<li class=\"last\">" ."<strong>Topic:</strong> \t" .$project_name[$i] ."<br>"."<strong>Duration:</strong> \t" . $project_duration[$i]. "<br>"."<strong>Objective:</strong> \t" .$project_objective[$i]. "<br>"."<strong>Tools and Techniques:</strong> \t" .$project_tools[$i]. "<br>"."<strong>Outcome:</strong> \t" .$project_outcome[$i]. "</li>\n";
		}
		//$i++;

	}
	print "\t\t\t\t\t\t\t</ul>\n\n";
	print <<< _HTML_
	</p>

						</div>
					</div>

_HTML_;


}


function cv_achieve($a_name, $a_area, $a_where)
{
	print <<< _HTML_
					<div class="yui-gf">
						<div class="yui-u first">
						<h3>Achievements and Honours</h3>
					</div>
						<div class="yui-u">
							<p class="enlarge">
_HTML_;			
							
print "\t\t\t\t\t\t\t<ul class=\"talent\">\n";
	$num_knowledges = count($a_name);
	//$i=0;
	//foreach ( $project_name, $project_duration, $project_objective, $project_tools, $project_outcome as $line, $line1,$line2,$line3,$line4)
	for($i=0;$i<$num_knowledges;$i++)
	{
		if ($i < $num_knowledges - 1 )
		{
			print "\t\t\t\t\t\t\t<li>" ."<strong>Name:</strong> \t" .$a_name[$i] ."<br>"."<strong>Area/ Topic / Details: </strong> \t" . $a_area[$i]. "<br>"."<strong>When and Where: </strong> \t" .$a_where[$i]. "<br>\n";
		}
		else
		{
			//print "\t\t\t\t\t\t\t<li class=\"last\">" . $line. "</li>\n";
			//print "\t\t\t\t\t\t\t<li class=\"last\">" . $line ."\n". $line1. "\n".$line2. "\n".$line3. "\n".$line4 "</li>\n";
			// print "\t\t\t\t\t\t\t<li class=\"last\">" ."<strong>Topic:</strong> \t" .$project_name[$i] ."<br>"."<strong>Duration:</strong> \t" . $project_duration[$i]. "<br>"."<strong>Objective:</strong> \t" .$project_objective[$i]. "<br>"."<strong>Tools and Techniques:</strong> \t" .$project_tools[$i]. "<br>"."<strong>Outcome:</strong> \t" .$project_outcome[$i]. "</li>\n";
			print "\t\t\t\t\t\t\t<li>" ."<strong>Name:</strong> \t" .$a_name[$i] ."<br>"."<strong>Area/ Topic / Details: </strong> \t" . $a_area[$i]. "<br>"."<strong>When and Where: </strong> \t" .$a_where[$i]. "<br>\n";
		}
		//$i++;

	}
	print "\t\t\t\t\t\t\t</ul>\n\n";
	print <<< _HTML_
	</p>

						</div>
					</div>

_HTML_;


}



function cv_extra($extracur)
{
	print <<< _HTML_
					<div class="yui-gf">
						<div class="yui-u first">
						<h3>Extra Curricular Activities:</h3>
					</div>
						<div class="yui-u">
							<p class="enlarge">
_HTML_;			
							
print "\t\t\t\t\t\t\t<ul class=\"talent\">\n";
	$num_knowledges = count($extracur);
	//$i=0;
	//foreach ( $project_name, $project_duration, $project_objective, $project_tools, $project_outcome as $line, $line1,$line2,$line3,$line4)
	for($i=0;$i<$num_knowledges;$i++)
	{
		if ($i < $num_knowledges - 1 )
		{
			print "\t\t\t\t\t\t\t<li>".$extracur[$i]."<br>\n";
		}
		else
		{
			//print "\t\t\t\t\t\t\t<li class=\"last\">" . $line. "</li>\n";
			//print "\t\t\t\t\t\t\t<li class=\"last\">" . $line ."\n". $line1. "\n".$line2. "\n".$line3. "\n".$line4 "</li>\n";
			// print "\t\t\t\t\t\t\t<li class=\"last\">" ."<strong>Topic:</strong> \t" .$project_name[$i] ."<br>"."<strong>Duration:</strong> \t" . $project_duration[$i]. "<br>"."<strong>Objective:</strong> \t" .$project_objective[$i]. "<br>"."<strong>Tools and Techniques:</strong> \t" .$project_tools[$i]. "<br>"."<strong>Outcome:</strong> \t" .$project_outcome[$i]. "</li>\n";
			print "\t\t\t\t\t\t\t<li>".$extracur[$i]."<br>\n";
		}
		//$i++;

	}
	print "\t\t\t\t\t\t\t</ul>\n\n";
	print <<< _HTML_
	</p>

						</div>
					</div>

_HTML_;


}






function cv_intern($intern_name, $intern_duration, $intern_objective, $intern_tools, $intern_outcome )
{
	print <<< _HTML_
					<div class="yui-gf">
						<div class="yui-u first">
						<h3>Internship/ Inplant Training</h3>
					</div>
						<div class="yui-u">
							<p class="enlarge">
_HTML_;			
							
print "\t\t\t\t\t\t\t<ul class=\"talent\">\n";
	$num_knowledges = count($intern_name);
	//$i=0;
	//foreach ( $project_name, $project_duration, $project_objective, $project_tools, $project_outcome as $line, $line1,$line2,$line3,$line4)
	for($i=0;$i<$num_knowledges;$i++)
	{
		if ($i < $num_knowledges - 1 )
		{
			print "\t\t\t\t\t\t\t<li>" ."<strong>Organization:</strong> \t" .$intern_name[$i] ."<br>"."<strong>Duration:</strong> \t" . $intern_duration[$i]. "<br>"."<strong>Objective:</strong> \t" .$intern_objective[$i]. "<br>"."<strong>Tools and Techniques:</strong> \t" .$intern_tools[$i]. "<br>"."<strong>Outcome:</strong> \t" .$intern_outcome[$i]. "</li><br>\n";
		}
		else
		{
			//print "\t\t\t\t\t\t\t<li class=\"last\">" . $line. "</li>\n";
			//print "\t\t\t\t\t\t\t<li class=\"last\">" . $line ."\n". $line1. "\n".$line2. "\n".$line3. "\n".$line4 "</li>\n";
			print "\t\t\t\t\t\t\t<li class=\"last\">" ."<strong>Organization:</strong> \t" .$intern_name[$i] ."<br>"."<strong>Duration:</strong> \t" . $intern_duration[$i]. "<br>"."<strong>Objective:</strong> \t" .$intern_objective[$i]. "<br>"."<strong>Tools and Techniques:</strong> \t" .$intern_tools[$i]. "<br>"."<strong>Outcome:</strong> \t" .$intern_outcome[$i]. "</li><br>\n";
		}
		//$i++;

	}
	print "\t\t\t\t\t\t\t</ul>\n\n";
	print <<< _HTML_
	</p>

						</div>
					</div>

_HTML_;


}










function cv_knowledges($knowledges_title,$first_knowledges,$second_knowledges,$third_knowledges)
{
	print <<< _HTML_
						<div class="yui-gf">
						<div class="yui-u first">
							<h3>$knowledges_title</h3>
						</div>
						<div class="yui-u">

_HTML_;

	print "\t\t\t\t\t\t\t<ul class=\"talent\">\n";
	$num_knowledges = count($first_knowledges);
	$i=1;
	foreach ($first_knowledges as $line)
	{
		if ($i < $num_knowledges)
		{
			print "\t\t\t\t\t\t\t<li>" . $line . "</li>\n";
		}
		else
		{
			print "\t\t\t\t\t\t\t<li class=\"last\">" . $line. "</li>\n";
		}
		$i++;
	}
	print "\t\t\t\t\t\t\t</ul>\n\n";

	print "\t\t\t\t\t\t\t<ul class=\"talent\">\n";
	$num_knowledges = count($second_knowledges);
	$i=1;
	foreach ($second_knowledges as $line)
	{
		if ($i < $num_knowledges)
		{
			print "\t\t\t\t\t\t\t<li>" . $line . "</li>\n";
		}
		else
		{
			print "\t\t\t\t\t\t\t<li class=\"last\">" . $line . "</li>\n";
		}
		$i++;
	}
	print "\t\t\t\t\t\t\t</ul>\n\n";
	
	print "\t\t\t\t\t\t\t<ul class=\"talent\">\n";
	$num_knowledges = count($third_knowledges);
	$i=1;
	foreach ($third_knowledges as $line)
	{
		if ($i < $num_knowledges)
		{
			print "\t\t\t\t\t\t\t<li>" . $line . "</li>\n";
		}
		else
		{
			print "\t\t\t\t\t\t\t<li class=\"last\">" . $line . "</li>\n";
		}
		$i++;
	}
	print "\t\t\t\t\t\t\t</ul>\n\n";

	print <<< _HTML_
						</div>
					</div>

_HTML_;
}

function cv_experience($experience_title,$all_jobs)
{
	print <<< _HTML_
						<div class="yui-gf">
	
						<div class="yui-u first">
							<h3>$experience_title</h3>
						</div>

						<div class="yui-u">

_HTML_;

	$num_all_jobs = count($all_jobs);
	$i=2;
	for ($row = 0; $row < $num_all_jobs; $row++)
	{
		// Calcul descriptions lines number
		$num_lines_desc = count($all_jobs[$row]);

		// Detect if last job of the list (first job in fact)
		if ($row != ($num_all_jobs - 1))
		{
			print "\t\t\t\t\t\t\t<div class=\"job\">\n";
		}
		else
		{
			print "\t\t\t\t\t\t\t<div class=\"job last\">\n";
		}

		// Print lines
    	for ($col = 0; $col < $num_lines_desc; $col++)
    	{
    		if ($i < 5)
    		{
    			print "\t\t\t\t\t\t\t\t<h" . $i . ">" . $all_jobs[$row][$col] . "</h" . $i . ">\n";
    		}
    		else
    		{
    			print "\t\t\t\t\t\t\t\t<p align=\"justify\">" . $all_jobs[$row][$col] . "</p>\n";
    		}
    		$i++;
	    }
	    print "\t\t\t\t\t\t\t</div>\n";
		$i=2;
	}

	print <<< _HTML_
						</div>
					</div>

_HTML_;
}

function cv_education($education_title,$all_education)
{
	print <<< _HTML_
					<div class="yui-gf">
						<div class="yui-u first">
							<h3>$education_title</h3>
						</div>

_HTML_;

	$num_all_education = count($all_education);
	$i=2;
	for ($row = 0; $row < $num_all_education; $row++)
	{
		// Calcul descriptions lines number
		$num_lines_desc = count($all_education[$row]);

		// Detect if last education of the list (first education in fact)
		if ($row != ($num_all_education - 1))
		{
			print "\t\t\t\t\t\t\t<div class=\"yui-u\">\n";
		}
		else
		{
			print "\t\t\t\t\t\t\t<div class=\"yui-u last\">\n";
		}

		// Print lines
    	for ($col = 0; $col < $num_lines_desc; $col++)
    	{
    		if ($i < 3)
    		{
    			print "\t\t\t\t\t\t\t\t<h3>" . $all_education[$row][$col] . "</h3>\n";
    		}
    		else
    		{
    			print "\t\t\t\t\t\t\t\t<h4>• " . $all_education[$row][$col] . "</h4>\n";
    		}
    		
    		if ($col == ($num_lines_desc - 1))
    		{
    			print "\t\t\t\t\t\t\t<br />\n";
    			print "\t\t\t\t\t\t\t</div>\n";
    		}
    		
    		$i++;
	    }
		$i=2;
	}

	print <<< _HTML_
					</div>

_HTML_;
}

function cv_others($others_title,$all_others,$others_list)
{
	print <<< _HTML_
					<div class="yui-gf">
						<div class="yui-u first">
							<h3>$others_title</h3>
						</div>

_HTML_;

	$num_all_others = count($all_others);
	$i=2;
	for ($row = 0; $row < $num_all_others; $row++)
	{
		// Calcul descriptions lines number
		$num_lines_desc = count($all_others[$row]);

		// Detect if last others of the list (first others in fact)
		if ($row != ($num_all_others - 1))
		{
			print "\t\t\t\t\t\t\t<div class=\"yui-u\">\n";
		}
		else
		{
			print "\t\t\t\t\t\t\t<div class=\"yui-u last\">\n";
		}

		// Print lines
    	for ($col = 0; $col < $num_lines_desc; $col++)
    	{
    		if ($i < 3)
    		{
    			print "\t\t\t\t\t\t\t\t<h3>" . $all_others[$row][$col] . "</h3>\n";
    		}
    		else
    		{
    			print "\t\t\t\t\t\t\t\t<h4>" . $all_others[$row][$col] . "</h4>\n";
    		}
    		
    		if ($col == ($num_lines_desc - 1))
    		{
    			print "\t\t\t\t\t\t\t<br />\n";
    			print "\t\t\t\t\t\t\t</div>\n";
    		}
    		
    		$i++;
	    }
		$i=2;
	}
	print "\t\t\t\t\t\t\t<div class=\"yui-u\">\n";

	// Print list
	if ($others_list)
	{
		// Calcul minimum row for all columns
		$num_others_list = count($others_list);
		$max_elements_per_column = sprintf("%01.1f", ($num_others_list / 3));

		// Get value before and after comma
		if (ereg ("([0-9]*)\.([0-9])", $max_elements_per_column, $formated)) {
			// Before comma
			$bc_num = $formated[1];
			// After comma
			$ac_num = $formated[2];
		}
		$last_row_for_column = $num_others_list - ($bc_num * 3);

		$num_row=1;
		$num_col=1;
		foreach ($others_list as $element)
		{
			if ($num_row <= $bc_num)
			{
				if ($num_row == 1)
				{
					print "\t\t\t\t\t\t\t\t<ul class=\"talent\">\n";
				}
				if (($num_col > $last_row_for_column) and ($num_row == $bc_num))
				{
					print "\t\t\t\t\t\t\t\t\t<li class=\"last\">" . $element . "</li>\n";
					$num_row=1;
					$num_col++;
					print "\t\t\t\t\t\t\t\t</ul>\n";
				}
				else
				{
					print "\t\t\t\t\t\t\t\t\t<li>" . $element . "</li>\n";
					$num_row++;
				}
			}
			else
			{
				$num_row=1;
				$num_col++;
				print "\t\t\t\t\t\t\t\t\t<li class=\"last\">" . $element . "</li>\n";
				print "\t\t\t\t\t\t\t\t</ul>\n";
			}	
		}
	}						

	print <<< _HTML_
		    					</div>
			    			</div>

_HTML_;
}

function cv_hobby($hobby_title,$hobby_list)
{
	print <<< _HTML_
					<div class="yui-gf last">
						<div class="yui-u first">
							<h3>$hobby_title</h3>
						</div>
						<div class="yui-u">

_HTML_;

	foreach ($hobby_list as $fun)
	{
		print "\t\t\t\t\t\t\t<h3>• " . $fun . "</h3>\n";
	}

	print <<< _HTML_
						</div>
					</div>

_HTML_;
}

function main_stop($exclude,$my_name)
{
	print <<< _HTML_
				</div>
			</div>
		</div>

_HTML_;

    if ($exclude == 0)
    {
        print "\t\t<div id=\"ft\">\n";
        print "\t\t\t<p>" . "$my_name" . " - <a href=\"http://" . $_SERVER["SERVER_NAME"] . "\">http://" . $_SERVER["SERVER_NAME"] . "</a></p><br />\n";
        print <<< _HTML_
                        <p><a href="http://validator.w3.org/check?uri=referer"><img
                        src="http://www.w3.org/Icons/valid-xhtml10-blue"
                        alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a></p>

_HTML_;
        print "\t\t</div>\n";
    }

    print <<< _HTML_
	</div>
</div>

</body>
</html>
_HTML_;
}

// Check for PDF request
//$pdf=1;

if ($pdf == 1)
{
    push_pdf_version($lang,$fullcv,$wkhtmltopdf_bin,$options,$site,$pdf_destination,$pdf_filename,$my_name,$exclude);
}
// Header : HTML header, title, encoding, CSS
cv_header($lang,$title,$version,$my_name);
// Name, Logo, Personnal informations
cv_name($fullcv,$my_name,$role,$personnal_infos,$personnal_infos_full);
// Do not remove main start
main_start();
// Profile
if ($profile_title)
{
	cv_profile($profile_title,$career);
}
// Aim

// SKills
if ($skills_name)
{
	cv_skills($skills_name,$skill1,$skill2,$skill3);
}
//OTHER TECHNICAL QUALIFICATIONS
if ($aim_title)
{
	cv_aim($aim_title,$othertech);
}
// Softs
if ($knowledges_title)
{
	//cv_knowledges($knowledges_title,$first_knowledges,$second_knowledges,$third_knowledges);
	cv_project($project_name, $project_duration, $project_obj, $project_tools, $project_outcome);
}
// Experience
if ($experience_title)
{
	cv_intern($intern_name, $intern_duration, $intern_obj, $intern_tools, $intern_outcome);
}
if($a_title){
 cv_achieve($a_name, $a_area, $a_where);
}
if($extra_title){
	cv_extra($extracur);
}

if($c_title){
	cv_contact($cno,$cad);
}
// Education
// if ($education_title)
// {
// 	cv_education($education_title,$all_education);
// }
// Others
// if ($others_title)
// {
// 	cv_others($others_title,$all_others,$others_list);
// }
// Spare Times
// if ($hobby_title)
// {
// 	cv_hobby($hobby_title,$hobby_list);
// }
// Do not remove main start
main_stop($exclude,$my_name);
?>
