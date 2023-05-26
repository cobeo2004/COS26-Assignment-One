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

            if ($result) {
                  // Start the unordered list
    echo "<ol>";
    
    // Loop through each row and display the names
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        // Display each name as a list item
        echo "<li>$name</li>";
    }
    
    // Close the unordered list
    echo "</ol>";
    
    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle any errors that occurred during the query
    echo "Error: " . mysqli_error($connection);
}
            
            
            ?>
            <ol>
                <li><a href="jobs.html#cto">Chief Technology Officer</a></li>
                <li><a href="jobs.html#cloud_en">Cloud Engineer</a></li>
            </ol>
        </div>
        <!-- JOB 1: Chief Technology Officer -->
        <div class="job-des">
            <section>
                <h2 id="cto">Chief Technology Officer</h2>
                <dl>
                    <dt><strong>Position description reference number</strong></dt>
                    <dd>00000</dd>
                    <dt><strong>Reports to</strong></dt>
                    <dd>Chief Executive Officer</dd>
                    <dt><strong>Salary range</strong></dt>
                    <dd>237,500 &#8211; 376,665 AUD&#x2F;year <sup><a href="jobs.html#cite1">[1]</a></sup></dd>
                </dl>
                <h3>Brief Description</h3>
                <p>
                    A Chief Technology Officer needs to improve and perform new technology to establish or innovate our products (including both goods and services) for the client and the customers. <sup><a href="jobs.html#cite5">[5]</a></sup>
                    They ensure that the technical improvements go in line with the company&#39;s target and that the technological resources are used for the right intention &#8211; for technological development. <sup><a href="jobs.html#cite4">[4]</a></sup>
                </p>
                <h3>Key Responsibilities</h3>
                <ul>
                    <li>Managing the technology strategies of the organisation</li>
                    <li>Overseeing data security and management</li>
                    <li>Upkeep of the company's network</li>
                    <li>Visualizing how various technologies will be used across the organisation</li>
                    <li>Finding methods to enhance the company&#39;s technology resources</li>
                    <li>Establishing networking safeguards that keep the privacy of client data and stop security breakdown</li>
                    <li>Determining if the usage of new technologies is appropriate for the company</li>
                    <li>Ensuring that the technologies presently in use are effective and implementing adjustments as needed</li>
                </ul>
                <h3>Required attributes</h3>
                <h4>Essential</h4>
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
                            <li>Experience leading programs and projects within the technological environment with ideally around 15 years <sup><a href="jobs.html#cite5">[5]</a></sup></li>
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
                    <dd>132,500 &#8211; 180,000 AUD&#x2F;year <sup><a href="jobs.html#cite3">[3]</a></sup></dd>
                </dl>
                <h3>Brief Description</h3>
                <p>
                    A Cloud Engineer needs to create, run, and maintain a cloud infrastructure.
                    This includes sticking to the best performance of the environment and ensuring network security. <sup><a href="jobs.html#cite2">[2]</a></sup>
                </p>
                <h3>Key Responsibilities <sup><a href="jobs.html#cite6">[6]</a></sup></h3>
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
                            <li>Experiencing in the field for 3+ years <sup><a href="jobs.html#cite6">[6]</a></sup></li>
                            <li>Experience integrating with third party apps supporting designing cloud infrastructures</li>
                        </ul>
                    </li>
                </ul>
            </section>
        </div>
        <!-- REFERENCES -->
        <aside>
            <h2>References</h2>
            <ol>
                <li id="cite1">Anonymous. (n.d.). CTO / Chief Technology Officer Salary & Rates Guide. Clicks IT Recruitment. <a href="https://clicks.com.au/job-salary/cto-chief-technology-officer/">https://clicks.com.au/job-salary/cto-chief-technology-officer/</a></li>
                <li id="cite2">Anonymous. (n.d.) Cloud Engineer. Indeed. <a href="https://www.indeed.com/career/cloud-engineer">https://www.indeed.com/career/cloud-engineer</a></li>
                <li id="cite3">Anonymous. (n.d.). Cloud Engineer Salary & Rates Guide. Clicks IT Recruitment. <a href="https://clicks.com.au/job-salary/cloud-engineer/#:~:text=The%20average%20Cloud%20Engineer%20salary,up%20to%20%24180%2C000%20per%20year">https://clicks.com.au/job-salary/cloud-engineer/#:~:text=The%20average%20Cloud%20Engineer%20salary,up%20to%20%24180%2C000%20per%20year</a></li>
                <li id="cite4">Anonymous. (2020, August 3). Chief Technology Officer Job Description | Hudson. Hudson Australia. <a href="https://au.hudson.com/employers/recruitment/technology-it/chief-technology-officer-job-description/#:~:text=What%20does%20a%20Chief%20Technology">https://au.hudson.com/employers/recruitment/technology-it/chief-technology-officer-job-description/#:~:text=What%20does%20a%20Chief%20Technology</a>‌</li>
                <li id="cite5">Frankenfield, J. (2023, January 23). Chief technology officer (CTO): Definition, how to become one, average salary. Investopedia. <a href="https://www.investopedia.com/terms/c/chief-technology-officer.asp">https://www.investopedia.com/terms/c/chief-technology-officer.asp</a></li>
                <li id="cite6">Indeed Editorial Team. (2023, March 10). Cloud Engineer Roles And Responsibilities: A Complete Guide. Indeed. <a href="https://in.indeed.com/career-advice/finding-a-job/cloud-engineer-roles-and-responsibilities">https://in.indeed.com/career-advice/finding-a-job/cloud-engineer-roles-and-responsibilities</a></li>
            </ol>
        </aside>
    </main>
    <?php
  // include footer
  include_once "footer.inc";
  ?>
</body>
</html>
