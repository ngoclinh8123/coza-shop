<?php
    include_once './modules/admin/heading-ad.php';
    include_once './modules/handle/connect-database.php';
    include_once './modules/handle/function.php';
?>
    <div class="chart">
    <?php  
        if($connect){
            $dataOrders=array();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            // định dạng date là Y-n-d chứ không phải Y-m-d vì tháng 08 với 8 khi cho vào lệnh sql khác nhau
            $thisTime=date('Y-n-d');
            $thisYear=explode('-',$thisTime)[0];
            $thisMonth=explode('-',$thisTime)[1];
            $thisDay=explode('-',$thisTime)[2];
            // $sql="select day from orders where (year='".$thisYear."' and month='".$thisMonth."')";
            $sql="select month,count(*) from orders where year='".$thisYear."' group by month";
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataOrders,$row);
            }
            // echo '<pre>';print_r($dataOrders);

            
        }

    ?>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

<!-- doan nay lay tu foot-ad -->
</div>
</div>
    <script>
        let myChart=document.getElementById('myChart').getContext("2d");
        const chart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels: [
                    <?php 
                        for($i=1;$i<=12;$i++){
                            echo $i.",";
                        }
                    ?>
                ],
                datasets: [{
                    label: 'Đơn hàng đã bán năm <?php echo $thisYear; ?>',
                    data: [
                        <?php
                            for($i=1;$i<=12;$i++){
                                $flag=true;
                                foreach($dataOrders as $key=>$value){
                                    if($i==$value[0]){
                                        echo $value[1] .",";
                                        $flag=false;
                                    }
                                }
                                if($flag){
                                    echo "0,";
                                }
                            }
                        ?>,
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script src="./modules/admin/js/admin.js"></script>
</body>
</html>