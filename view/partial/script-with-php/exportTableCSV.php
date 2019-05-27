<script type="text/javascript">
    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], {
            type: "text/csv"
        });

        // Download link
        downloadLink = document.createElement("a");

        // File name
        var dateName = document.getElementById('dateSpan').innerHTML;
        downloadLink.download = querySelector['location'] + ' ( ' + dateName + ' ) ' + '.csv'; //file name 

        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Hide download link
        downloadLink.style.display = "none";

        // Add the link to DOM
        document.body.appendChild(downloadLink);

        // Click download link
        downloadLink.click();
    }

    function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++)
                row.push((cols[j].innerText).replace(/,/g, ""));

            csv.push(row.join(","));
        }

        // Download CSV file
        var dateName = document.getElementById('dateSpan').innerHTML;
        downloadCSV(csv.join("\n"), querySelector['location'] + ' ( ' + dateName + ' ) ' + '.csv'); //file name
    }
</script>