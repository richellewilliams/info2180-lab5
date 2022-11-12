<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$statement = $conn->query
("SELECT co.name AS 'country_name', cit.name AS 'city_name', cit.district, cit.population
  FROM countries co
  INNER JOIN cities cit
  ON co.code = cit.country_code
  WHERE co.name LIKE '%$country%'");
$citiesResults = $statement->fetchAll(PDO::FETCH_ASSOC);

if (empty($country) == false) {
  if (empty($_GET['lookup'])) {
    ?>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Continent</th>
          <th>Independence</th>
          <th>Head of State</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php foreach ($results as $row): ?>
          <td><?= $row['name']?></td>
          <td><?= $row['continent']?></td>
          <td><?= $row['independence_year']?></td>
          <td><?= $row['head_of_state']?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>  
    <?php
  } else {
      if ($_GET['lookup'] == "cities") {
        ?>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>District</th>
              <th>Population</th>
            </tr>
          </thead>
          <tbody>
          <tr>
          <?php foreach ($citiesResults as $row): ?>
            <td><?= $row['city_name']?></td>
            <td><?= $row['district']?></td>
            <td><?= $row['population']?></td>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>  
        <?php
      }
  }
}