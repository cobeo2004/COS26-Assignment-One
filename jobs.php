<!--
filename: jobs.html
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 29-Mar-2023
description: Job descriptions page
-->
<?php error_reporting(error_reporting() & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en" class="job-class">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="draft.css"> -->
    <title>Jobs - CloudLabs</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="./styles/header_footer.css"> -->
</head>
<body class="index-body">
<?php
// include the header
$activePage = 'jobs';
include_once("header.inc");

// initialise database connection
include "settings.php";
include "db_functions.php";

?>
    <main id="job-main">
        <div class="header-container">
            <div class="job-typed-out">
                <h1>Our open positions</h1>
            </div>
        </div>
        <!-- Table of Contents -->
        <div class="table-of-content">
            <h2>Table of Contents</h2>

            <?php
            # get all job titles and display as list
            $query = "SELECT job_name FROM job_descriptions";
            $result = mysqli_query($connection, $query);

           # display as list
            echo "<ol>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><a href=\"jobs.php#" . $row["job_name"] . "\">" . $row["job_name"] . "</a></li>";
            }
            echo "</ol>";
            ?>
        </div>

            <?php
            # loop through each job description in the database and get the data for each job
            $query = "SELECT * FROM job_descriptions";
            $result_jobs = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result_jobs)) {
                # extract data and put into variables
                $position_reference = $row["position_reference"];
                $job_name = $row["job_name"];
                $reports_to = $row["reports_to"];
                # Add commas to salary range values to make it more readable
                $salary_range_start = number_format($row["salary_range_start"]);
                $salary_range_end = number_format($row["salary_range_end"]);
                $description = $row["description"];
                $essential_qualification = $row["essential_qualification"];
                $knowledge = $row["knowledge"];

                # start displaying job description
echo <<<EOL
                <div class=\"job-des\">
                <section>
                    <h2 id="$job_name">$job_name</h2>
                <dl>
                <dt><strong>Position description reference number</strong></dt>
                    <dd>$position_reference</dd>
                    <dt><strong>Reports to</strong></dt>
                    <dd>$reports_to</dd>
                    <dt><strong>Salary range</strong></dt>
                    <dd>$salary_range_start - $salary_range_end AUD&#x2F;year</dd>
                </dl>
                <h3>Brief Description</h3>
                <p>$description</p>
                <br>
                <h3>Key Responsibilities</h3>
EOL;

# get key responsibilities from database
$query = "SELECT * FROM key_responsibilities WHERE job_description = '$position_reference'";
$result = mysqli_query($connection, $query);

# loop through key responsibilities, display as list
echo "<ul>";
while ($row2 = mysqli_fetch_assoc($result)) {
    echo "<li>" . $row2["description"] . "</li>";
}
echo <<<EOL
                </ul>
                <h3>Required attributes</h3>
                <h4>Essential</h4>
                <table>
                    <tr>
                        <td>Qualification</td>
                        <td colspan="2">$essential_qualification</td>
                    </tr>
EOL;

# loop through skills, display as table
$query = "SELECT * FROM skills WHERE job_description = '$position_reference'";
$result_skills_header = mysqli_query($connection, $query);

# Add the 'Skills' header column, the rowspan is equal to the total number of skill descriptions for all skills
$total_skill_descriptions = 0;
while ($skill = mysqli_fetch_assoc($result_skills_header)) {
    # get the skill descriptions for this skill
    $query = "SELECT * FROM skill_descriptions WHERE skill_id = " . $skill["id"];
    $result_skill_desc = mysqli_query($connection, $query);

    # add the number of skill descriptions for this skill to the total number of skill descriptions
    $total_skill_descriptions = $total_skill_descriptions + mysqli_num_rows($result_skill_desc);
}

echo "<tr><td rowspan=\"$total_skill_descriptions\">Skills</td>";

# Display all skills + their descriptions

# loop through skills, display as table
$query = "SELECT * FROM skills WHERE job_description = '$position_reference'";
$result_skills = mysqli_query($connection, $query);

$skill_index = 0;

while ($skill = mysqli_fetch_assoc($result_skills)) {
    # get the skill descriptions for this skill
    $query = "SELECT * FROM skill_descriptions WHERE skill_id = " . $skill["id"];
    $result_skill_desc = mysqli_query($connection, $query);

    # get the number of skill descriptions for this skill
    $num_skill_desc = mysqli_num_rows($result_skill_desc);

    # if this is the first database row, do not make a new row
    if ($skill_index == 0) {
        echo "<td rowspan=\"$num_skill_desc\">" . $skill["name"] . "</td>";

        $skill_desc_index = 0;
        while ($skill_desc = mysqli_fetch_assoc($result_skill_desc)) {
            # if this is the first database row, do not make a new row
            if ($skill_desc_index == 0) {
                echo "<td>" . $skill_desc["description"] . "</td></tr>";
            } else {
                echo "<tr><td>" . $skill_desc["description"] . "</td></tr>";
            }
            $skill_desc_index++;
        }
    } else {
        echo "<tr><td rowspan=\"$num_skill_desc\">" . $skill["name"] . "</td>";

        $skill_desc_index = 0;
        while ($skill_desc = mysqli_fetch_assoc($result_skill_desc)) {
            # if this is the first database row, do not make a new row
            if ($skill_desc_index == 0) {
                echo "<td>" . $skill_desc["description"] . "</td></tr>";
            } else {
                echo "<tr><td>" . $skill_desc["description"] . "</td></tr>";
            }
            $skill_desc_index++;
        }
    }
        $skill_index++;
}

# Get required job knowledge from database and display
$query = "SELECT knowledge FROM job_descriptions WHERE position_reference = '$position_reference'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

$knowledge = $row["knowledge"];

echo "<tr><td>Knowledge</td><td colspan=\"2\">$knowledge</td></tr></table>";

# Get preferable qualifications from database and display as unordered list
$query = "SELECT * FROM preferable_qualifications WHERE job_description = '$position_reference'";
$result = mysqli_query($connection, $query);

echo "<br><h4>Preferable</h4><ul>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>" . $row["qualification"] . "</li>";
}
echo "</ul></section>";
  }  ?>
        </div>
    </main>
    <?php
  // include footer
  include_once "footer.inc";
  ?>
</body>
</html>
