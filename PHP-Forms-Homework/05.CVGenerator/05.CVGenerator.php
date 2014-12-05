<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CV Generator</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <form action="05.CVGenerator.php" method="post">
        <fieldset>
            <legend>Personal Info</legend>
            <input type="text" name="firstName" placeholder="First Name" required>
            <input type="text" name="lastName" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phoneNumber" placeholder="Phone Number" required>
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" value="male" id="male" checked>
            <label for="male">Male</label>

            <p>Birth Date</p>
            <input type="date" name="birthDate" id="birthDate" placeholder="dd/mm/yyyy" required>

            <p>Nationality</p>
            <select name="nationality" required>
                <option value="Bulgarian">Bulgarian</option>
                <option value="American">Indian</option>
                <option value="African">African</option>
                <option value="American">American</option>
                <option value="Russian">Russian</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Last Work Position</legend>
            <label for="companyName">Company Name</label>
            <input type="text" name="companyName"/>
            <section>
                <label for="fromDate">From</label>
                <input type="date" name="fromDate" id="fromDate" placeholder="dd/mm/yyyy"/>
            </section>
            <section>
                <label for="toDate">To</label>
                <input type="date" name="toDate" id="toDate" placeholder="dd/mm/yyyy"/>
            </section>
        </fieldset>
        <fieldset>
            <legend>Computer Skills</legend>
            <p>Programming Languages</p>
            <section id="computerLanguages">
                <section>
                    <input type="text" name="computerLanguage[]" class="displayInline"/>
                    <select name="computerLanguage-level[]">
                        <option value="Beginner">Beginner</option>
                        <option value="Programmer">Programmer</option>
                        <option value="Ninja">Ninja</option>
                    </select>
                </section>
            </section>
            <section class="addRemove">
                <a id="removeComputerLanguage">Remove Language</a>
                <a id="addComputerLanguage">Add Language</a>
            </section>
        </fieldset>
        <fieldset>
            <legend>Other Skills</legend>
            <p>Languages</p>
            <section id="languages">
                <section>
                    <input type="text" name="language[]" class="displayInline"/>
                    <select name="language-Comprehension[]">
                        <option value="default">-Comprehension-</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                    <select name="language-Reading[]">
                        <option value="default">-Reading-</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                    <select name="language-Writing[]">
                        <option value="default">-Writing-</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                </section>
            </section>
            <section class="addRemove">
                <a id="removeLanguage">Remove Language</a>
                <a id="addLanguage">Add Language</a>
            </section>
            <p>Driver's License</p>
            <label for="licenseB">B</label>
            <input type="checkbox" name="driveLicense[]" value="B" id="licenseB"/>
            <label for="licenseA">A</label>
            <input type="checkbox" name="driveLicense[]" value="A" id="licenseA"/>
            <label for="licenseC">C</label>
            <input type="checkbox" name="driveLicense[]" value="C" id="licenseC"/>
        </fieldset>
        <input type="submit" value="Generate CV" name="submitBtn"/>
    </form>
<?php
$firstName = htmlentities($_POST['firstName']);
$lastName = htmlentities($_POST['lastName']);
$companyName = htmlentities($_POST['companyName']);
$email = htmlentities($_POST['email']);
$phoneNumber = htmlentities($_POST['phoneNumber']);

if (preg_match('/^[a-zA-Z]{2,20}$/', $firstName) && preg_match('/^[a-zA-Z]{2,20}$/', $lastName)
    && preg_match('/^[a-zA-Z0-9]{2,20}$/', $companyName) && preg_match('/^\+?([0-9]+[- ]?)+$/', $phoneNumber)
    && preg_match('/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,5}$/', $email)
) {
    $languages = $_POST['language'];
    $correctLanguages = true;

    for ($i = 0; $i < count($languages); $i++) {
        if (!preg_match('/^[a-zA-Z]{2,20}$/', $languages[$i])) {
            $correctLanguages = false;
            break;
        }
    }

    if ($correctLanguages) {
        $gender = $_POST["gender"];
        $nationality = $_POST["nationality"];
        $birthDate = date_create($_POST["birthDate"]);
        $fromDate = date_create($_POST["fromDate"]);
        $toDate = date_create($_POST["toDate"]);
        $computerLanguages = $_POST['computerLanguage'];
        $computerLanguageLevels = $_POST['computerLanguage-level'];
        $comprehensions = $_POST["language-Comprehension"];
        $readings = $_POST["language-Reading"];
        $writings = $_POST["language-Writing"];

        echo '<section class="CV">';
        echo '<h1>CV</h1>';
        echo '<table>';
        echo '<tr><th colspan="2">Personal Info</th></tr>';
        echo '<tr><td>First Name</td><td>' . $firstName . '</td></tr>';
        echo '<tr><td>Last Name</td><td>' . $lastName . '</td></tr>';
        echo '<tr><td>Email</td><td>' . $email . '</td></tr>';
        echo '<tr><td>Phone Number</td><td>' . $phoneNumber . '</td></tr>';
        echo '<tr><td>Gender</td><td>' . $gender . '</td></tr>';
        echo '<tr><td>Birth Date</td><td>' . $birthDate->format('d-m-Y') . '</td></tr>';
        echo '<tr><td>Nationality</td><td>' . $nationality . '</td></tr>';
        echo '</table><br/>';
        echo '<table>';
        echo '<tr><th colspan="2">Last Work Positions</th></tr>';
        echo '<tr><td>Company Name</td><td>' . $companyName . '</td></tr>';
        echo '<tr><td>From</td><td>' . $fromDate->format('d-m-Y') . '</td></tr>';
        echo '<tr><td>To</td><td>' . $toDate->format('d-m-Y') . '</td></tr>';
        echo '</table><br/>';
        echo '<table>';
        echo '<tr><th colspan="2">Computer Skills</th></tr>';
        echo '<tr><td>Programming Languages</td>';
        echo '<td><table><tr><th>Language</th><th>Skill Level</th></tr>';
        for ($i = 0; $i < count($computerLanguages); $i++)
            echo '<tr><td>' . $computerLanguages[$i] . '</td><td>' . $computerLanguageLevels[$i] . '</td></tr>';
        echo '</table></td></tr>';
        echo '</table><br/>';
        echo '<table>';
        echo '<tr><th colspan="2">Other Skills</th></tr>';
        echo '<tr><td>Languages</td>';
        echo '<td><table><tr><th>Language</th><th>Comprehension</th><th>Reading</th><th>Writing</th></tr>';
        for ($i = 0; $i < count($languages); $i++)
            echo '<tr><td>' . $languages[$i] . '</td><td>' . $comprehensions[$i]
                . '</td><td>' . $readings[$i] . '</td><td>' . $writings[$i] . '</td></tr>';
        echo '</table></td></tr>';
        echo '<tr><td>Driver\'s license</td><td>' . join(', ', $_POST["driveLicense"]) . '</td></tr>';
        echo '</table>';
        echo '</section>';
    } else {
        echo '<br/>The information is invalid!';
    }
}
?>
    <script src="main.js"></script>
<?php
include '../includes/footer.php';
?>