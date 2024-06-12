<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'client.php';

if (isset($_GET['id'])) {
    $client = new Client($conn);
    $clientData = $client->getClient($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_initials = $_POST['middle_initials'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $region = $_POST['region_text'];
    $province = $_POST['province_text'];
    $city = $_POST['city_text'];
    $barangay = $_POST['barangay_text'];
    $street = $_POST['street_text'];

    $client = new Client($conn);
    if ($client->updateClient($id, $first_name, $last_name, $middle_initials, $gender, $email, $phone, $region, $province, $city, $barangay, $street)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Client</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Edit Client</h1>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $clientData['id']; ?>">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" value="<?php echo $clientData['first_name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $clientData['last_name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Middle Initials</label>
            <input type="text" class="form-control" name="middle_initials" value="<?php echo $clientData['middle_initials']; ?>">
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender" required>
                <option value="Male" <?php echo $clientData['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo $clientData['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $clientData['email']; ?>" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $clientData['phone']; ?>" required placeholder="+123-456-7890">
        </div>
        <div class="form-group">
            <label>Region</label>
            <select name="region" class="form-control" id="region"></select>
            <input type="hidden" name="region_text" id="region-text" value="<?php echo $clientData['region']; ?>" required>
        </div>
        <div class="form-group">
            <label>Province</label>
            <select name="province" class="form-control" id="province"></select>
            <input type="hidden" name="province_text" id="province-text" value="<?php echo $clientData['province']; ?>" required>
        </div>
        <div class="form-group">
            <label>City/Municipality</label>
            <select name="city" class="form-control" id="city"></select>
            <input type="hidden" name="city_text" id="city-text" value="<?php echo $clientData['city']; ?>" required>
        </div>
        <div class="form-group">
            <label>Barangay</label>
            <select name="barangay" class="form-control" id="barangay"></select>
            <input type="hidden" name="barangay_text" id="barangay-text" value="<?php echo $clientData['barangay']; ?>" required>
        </div>
        <div class="form-group">
            <label>Street (Optional)</label>
            <input type="text" class="form-control" name="street_text" value="<?php echo $clientData['street']; ?>">
        </div>
        <button type="submit" class="btn btn-success">Update Client</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="ph-address-selector.js"></script>
<script>
$(document).ready(function() {
    $.getJSON("philippine_provinces_cities_municipalities_and_barangays_2019v2.json", function(data) {
        var selectedRegion = "<?php echo $clientData['region']; ?>";
        var selectedProvince = "<?php echo $clientData['province']; ?>";
        var selectedCity = "<?php echo $clientData['city']; ?>";
        var selectedBarangay = "<?php echo $clientData['barangay']; ?>";

        // Populate regions
        $('#region').empty().append('<option>Select Region</option>');
        $.each(data, function(regionCode, regionData) {
            $('#region').append('<option value="' + regionCode + '">' + regionData.region_name + '</option>');
        });
        $('#region').val(selectedRegion);

        // Populate provinces
        if (selectedRegion) {
            $('#province').empty().append('<option>Select Province</option>');
            var provinces = data[selectedRegion].province_list;
            $.each(provinces, function(provinceName, provinceData) {
                $('#province').append('<option value="' + provinceName + '">' + provinceName + '</option>');
            });
            $('#province').val(selectedProvince);
        }

        // Populate cities
        if (selectedRegion && selectedProvince) {
            $('#city').empty().append('<option>Select City/Municipality</option>');
            var cities = data[selectedRegion].province_list[selectedProvince].municipality_list;
            $.each(cities, function(cityName, cityData) {
                $('#city').append('<option value="' + cityName + '">' + cityName + '</option>');
            });
            $('#city').val(selectedCity);
        }

        // Populate barangays
        if (selectedRegion && selectedProvince && selectedCity) {
            $('#barangay').empty().append('<option>Select Barangay</option>');
            var barangays = data[selectedRegion].province_list[selectedProvince].municipality_list[selectedCity].barangay_list;
            $.each(barangays, function(index, barangayName) {
                $('#barangay').append('<option value="' + barangayName + '">' + barangayName + '</option>');
            });
            $('#barangay').val(selectedBarangay);
        }
    });

    $('#region').change(function() {
        var regionCode = $(this).val();
        $('#region-text').val($('#region option:selected').text());
        $('#province').empty().append('<option>Select Province</option>');
        $('#city').empty().append('<option>Select City/Municipality</option>');
        $('#barangay').empty().append('<option>Select Barangay</option>');

        $.getJSON("philippine_provinces_cities_municipalities_and_barangays_2019v2.json", function(data) {
            var provinces = data[regionCode].province_list;
            $.each(provinces, function(provinceName, provinceData) {
                $('#province').append('<option value="' + provinceName + '">' + provinceName + '</option>');
            });
        });
    });

    $('#province').change(function() {
        var regionCode = $('#region').val();
        var provinceName = $(this).val();
        $('#province-text').val($('#province option:selected').text());
        $('#city').empty().append('<option>Select City/Municipality</option>');
        $('#barangay').empty().append('<option>Select Barangay</option>');

        $.getJSON("philippine_provinces_cities_municipalities_and_barangays_2019v2.json", function(data) {
            var cities = data[regionCode].province_list[provinceName].municipality_list;
            $.each(cities, function(cityName, cityData) {
                $('#city').append('<option value="' + cityName + '">' + cityName + '</option>');
            });
        });
    });

    $('#city').change(function() {
        var regionCode = $('#region').val();
        var provinceName = $('#province').val();
        var cityName = $(this).val();
        $('#city-text').val($('#city option:selected').text());
        $('#barangay').empty().append('<option>Select Barangay</option>');

        $.getJSON("philippine_provinces_cities_municipalities_and_barangays_2019v2.json", function(data) {
            var barangays = data[regionCode].province_list[provinceName].municipality_list[cityName].barangay_list;
            $.each(barangays, function(index, barangayName) {
                $('#barangay').append('<option value="' + barangayName + '">' + barangayName + '</option>');
            });
        });
    });

    $('#barangay').change(function() {
        $('#barangay-text').val($('#barangay option:selected').text());
    });
});
</script>
</body>
</html>
