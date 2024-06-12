$(document).ready(function() {
    $.getJSON("philippine_provinces_cities_municipalities_and_barangays_2019v2.json", function(data) {
        $.each(data, function(regionCode, regionData) {
            $('#region').append('<option value="' + regionCode + '">' + regionData.region_name + '</option>');
        });

        $('#region').change(function() {
            var regionCode = $(this).val();
            $('#region-text').val($('#region option:selected').text());
            $('#province').empty().append('<option>Select Province</option>');
            $('#city').empty().append('<option>Select City/Municipality</option>');
            $('#barangay').empty().append('<option>Select Barangay</option>');

            var provinces = data[regionCode].province_list;
            $.each(provinces, function(provinceName, provinceData) {
                $('#province').append('<option value="' + provinceName + '">' + provinceName + '</option>');
            });
        });

        $('#province').change(function() {
            var regionCode = $('#region').val();
            var provinceName = $(this).val();
            $('#province-text').val($('#province option:selected').text());
            $('#city').empty().append('<option>Select City/Municipality</option>');
            $('#barangay').empty().append('<option>Select Barangay</option>');

            var cities = data[regionCode].province_list[provinceName].municipality_list;
            $.each(cities, function(cityName, cityData) {
                $('#city').append('<option value="' + cityName + '">' + cityName + '</option>');
            });
        });

        $('#city').change(function() {
            var regionCode = $('#region').val();
            var provinceName = $('#province').val();
            var cityName = $(this).val();
            $('#city-text').val($('#city option:selected').text());
            $('#barangay').empty().append('<option>Select Barangay</option>');

            var barangays = data[regionCode].province_list[provinceName].municipality_list[cityName].barangay_list;
            $.each(barangays, function(index, barangayName) {
                $('#barangay').append('<option value="' + barangayName + '">' + barangayName + '</option>');
            });
        });

        $('#barangay').change(function() {
            $('#barangay-text').val($('#barangay option:selected').text());
        });
    });
});
