<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- we used pico css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Document</title>
</head>

<body>
    <div class="overflow-auto">
        <table class="striped">
            <thead data-theme="light">
                <tr>
                    <th scope="col">Year</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">Collage</th>
                    <th scope="col">The Programs</th>
                    <th scope="col">number_of_students</th>
                </tr>
            </thead>
            <tbody>
                <?php


                // This part of code will fetch the data we need from the Bahrain Open Data Portal API and Parse the JSON response (Data Retrieval)
                $URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
                $response = file_get_contents($URL);
                $data = json_decode($response, true);

                // This part of code will print all the data in the table (Data Visualization)
                foreach ($data['results'] as $result) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $result['year'] . "</th>";
                    echo "<th scope='row'>" . $result['semester'] . "</th>";
                    echo "<th scope='row'>" . $result['the_programs'] . "</th>";
                    echo "<th scope='row'>" . $result['nationality'] . "</th>";
                    echo "<th scope='row'>" . $result['colleges'] . "</th>";
                    echo "<th scope='row'>" . $result['number_of_students'] . "</th>";
                    echo "</tr>";
                }

                ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>

    </div>
</body>

</html>