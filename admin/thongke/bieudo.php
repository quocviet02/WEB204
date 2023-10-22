<div class="row2">
    <div class="row2 font_title">
      <h1>Biểu đồ</h1>
    </div>
    <div class="row2 form_content ">
      <div
               id="myChart" style="width: 800px; height: 500px; margin: 0 auto;">
      </div>
        <script  src="https://www.gstatic.com/charts/loader.js"></script>
      <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

// Set Data
          const data = google.visualization.arrayToDataTable([
            <?php
            $tongdm = count($resultB); //đếm số lượng trong mảng 
            
           
            $i = 1;
                foreach ($resultB as $key => $value) {
                    extract($value);
                    if ($i==$tongdm) {
                        $dauphay="";
                    }else{
                        $dauphay=",";
                    }
                    echo "
                        ['".$value['tendm']."','".$value['countsp']."']
                    ".$dauphay;
                    $i+=1;
                }    
            ?>
          ]);

// Set Options
          const options = {
            title:'Thống kê sản phẩm theo danh mục',
            is3D:true
          };

// Draw
          const chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);

        }
      </script>

    </div>
  </div>