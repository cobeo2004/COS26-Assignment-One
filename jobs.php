<!--
filename: jobs.html
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 29-Mar-2023
description: Job descriptions page
-->

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

// TODO: Dynamically generate job descriptions
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
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                # extract data and put into variables
                $position_reference = $row["position_reference"];
                $job_name = $row["job_name"];
                $reports_to = $row["reports_to"];
                $salary_range_start = $row["salary_range_start"];
                $salary_range_end = $row["salary_range_end"];
                $description = $row["description"];
                $essential_qualification = $row["essential_qualification"];
                $knowledge = $row["knowledge"];

                # start displaying job description
echo <<<EOL
                <div class=\"job-des\">";
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
$result_skills = mysqli_query($connection, $query);

$skill_index = 0;

echo "<tr>";

# TODO: add skills row, rowspan = number of skill descriptions for each skill


while ($skill = mysqli_fetch_assoc($result_skills)) {
    # get the skill descriptions for this skill
    $query = "SELECT * FROM skill_descriptions WHERE skill_id = " . $skill["id"];
    $result_skill_desc = mysqli_query($connection, $query);

    # if this is the first database row, do not make a new row
    if ($skill_index == 0) {
        echo "<td>" . $skill["name"] . "</td>";
        
        $skill_desc_index = 0;
        while ($skill_desc = mysqli_fetch_assoc($result_skill_desc)) {
            # if this is the first database row, do not make a new row
            if ($skill_desc_index == 0) {
                echo "<td>" . $skill_desc["description"] . "</td>";
            } else {
                echo "<tr><td></td><td>" . $skill_desc["description"] . "</td></tr>";
            }
            $skill_desc_index++;
        }
    } else {
        echo "<tr><td>" . $skill["name"] . "</td>";
        
        $skill_desc_index = 0;
        while ($skill_desc = mysqli_fetch_assoc($result_skill_desc)) {
            # if this is the first database row, do not make a new row
            if ($skill_desc_index == 0) {
                echo "<td>" . $skill_desc["description"] . "</td></tr>";
            } else {
                echo "<tr><td></td><td>" . $skill_desc["description"] . "</td></tr>";
            }
            $skill_desc_index++;
        }
    }
            
        $skill_index++;
}
            
  }  ?>
                     
        
                

                <table>
                    <tr>
                        <td>Qualification</td>
                        <td colspan="2">Earning a bachelor&#39;s degree in computer science or another related field</td>
                    </tr>
                    <tr>
                        <td rowspan="8">Skills</td>
                        <td rowspan="3">Vision</td>
                        <td>To build a team that is suitable and effective for you</td>
                    </tr>
                    <tr>
                        <td>To plan future development for the company toward its aim</td>
                    </tr>
                    <tr>
                        <td>To research and predict ways different technologies impact the company&#39;s development</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Communication and teamwork</td>
                        <td>To lead, manage, encourage team members and convince other staff and protect the team&#39;s opinion</td>
                    </tr>
                    <tr>
                        <td>To negotiate with other company</td>
                    </tr>
                    <tr>
                        <td rowspan="3">Flexibility and initiative</td>
                        <td>To constantly educate themselves and be up-to-date with information</td>
                    </tr>
                    <tr>
                        <td>To respond well to construct feedback</td>
                    </tr>
                    <tr>
                        <td>To well-adapt to new environments and surprising situations</td>
                    </tr>
                    <tr>
                        <td>Knowledge</td>
                        <td colspan="2">Computer Science field</td>
                    </tr>
                </table>
                <h4>Preferable</h4>
                <ul>
                    <li>Qualifications
                        <ul>
                            <li>Master of Computer Science or related fields, a post-graduate degree in computer science or related fields</li>
                            <li>Experience leading programs and projects within the technological environment with ideally around 15 years</li>
                        </ul>
                    </li>
                    <li>Knowledgeable in Mathematics, Statistics, and Business</li>
                </ul>
            </section>
            <!-- JOB 2: Cloud Engineer -->
            <section>
                <h2 id="cloud_en">Cloud Engineer</h2>
                <dl>
                    <dt><strong>Position description reference number</strong></dt>
                    <dd>00001</dd>
                    <dt><strong>Reports to</strong></dt>
                    <dd>Cloud Architecture Manager</dd>
                    <dt><strong>Salary range</strong></dt>
                    <dd>132,500 &#8211; 180,000 AUD&#x2F;year </dd>
                </dl>
                <h3>Brief Description</h3>
                <p>
                    A Cloud Engineer needs to create, run, and maintain a cloud infrastructure.
                    This includes sticking to the best performance of the environment and ensuring network security. 
                </p>
                <h3>Key Responsibilities </h3>
                <ul>
                    <li>Planning and designing cloud computing products such as cloud applications and services</li>
                    <li>Programming codes for cloud systems in coding languages such as Java, Python, C++, …</li>
                    <li>Supporting the deployment of cloud-based infrastructure, including uploading information, setting up mechanisms for data, increasing cloud storage capacity if needed</li>
                    <li>Building a system that links all devices within a firm and a support system to keep the cloud environment secure</li>
                    <li>Finding flaws in the system and troubleshooting issues on the system and security errors</li>
                    <li>Improving the efficiency and speed of the system by automating specific system operations</li>
                    <li>Executing a recovery and a continuity plan to prevent data loss</li>
                    <li>Being up-to-date with advancements in the field of cloud</li>
                    <li>Working with technical staff (in your and other departments) to design, fix and enhance the system</li>
                    <li>Working with stakeholders to understand advancements that they want to apply to the current system</li>
                    <li>Offering support to meet customer requirements</li>
                </ul>
                <h3>Required attributes</h3>
                <h4>Essential</h4>
                <table>
                    <tr>
                        <td>Qualifications</td>
                        <td colspan="2">Earning a bachelor&#39;s degree in computer science or a related field</td>
                    </tr>
                    <tr>
                        <td rowspan="6">Skills</td>
                        <td>Detail-oriented</td>
                        <td>To pay attention to details and finding mistakes in codes or the cloud product in general</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Vision and risk-management</td>
                        <td>To visualize the most productive design of the cloud infrastructure</td>
                    </tr>
                    <tr>
                        <td>To foresee potential problems and lessen them</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Communication and teamwork</td>
                        <td>To work within the team efficiently</td>
                    </tr>
                    <tr>
                        <td>To present, process information and negotiate with other teams and different firms</td>
                    </tr>
                    <tr>
                        <td>Time-management</td>
                        <td>To work with multiple projcets simultaneously
                    </tr>
                    <tr>
                        <td rowspan="2">Knowledge</td>
                        <td colspan="2">Several coding languages such as Python, C++, Java</td>
                    </tr>
                    <tr>
                        <td colspan="2">Cloud security (cloud protocols, etc.) to prevent data loss</td>
                    </tr>
                </table>
                <h4>Preferable</h4>
                <ul>
                    <li>Qualifications
                        <ul>
                            <li>Earning computer certifications such as AWS and GCP</li>
                            <li>Experiencing in the field for 3+ years</li>
                            <li>Experience integrating with third party apps supporting designing cloud infrastructures</li>
                        </ul>
                    </li>
                </ul>
            </section>
        </div>
    </main>
    <?php
  // include footer
  include_once "footer.inc";
  ?>
</body>
</html>