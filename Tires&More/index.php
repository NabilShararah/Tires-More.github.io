<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tire Shop</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body {
            background-image: url('Images/tires$more.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            margin: 0;
            padding: 0;
            height: 100vh; 
            
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8); 
            color: #333; 
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50; 
            color: white; 
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        tr:hover {
            background-color: #ddd; 
        }
    </style>
</head>
</head>
<body>
    <header>
        <h1>Welcome to Our Shop</h1>
        <nav>
            <a href="products.php">View Tires</a>
            <a href="services.php">Book a Service</a>
            <a href="php/logout.php">Logout</a>
        </nav>
    </header>

    <marquee behavior="" direction="">
        <table CELLSPACING="0" CELLPADDING="0">
            <tr>
                <td><img src="Images/pic1.webp" width="200px" height="150px" alt="Kit Crates Logo"></td>
                <td><img src="Images/pic2.jpg" width="200px" height="150px" alt="Solo Crate Image"></td>
                <td><img src="Images/pic3.jpg" width="200px" height="150px" alt="Trio Crate Image"></td>
                <td><img src="Images/pic7.jpg" width="200px" height="150px" alt="Real Madrid's Kit Image"></td>
                <td><img src="Images/pic5.jpg" width="200px" height="150px" alt="AC Milan's Kit Image"></td>
                <td><img src="Images/pic8.jpg" width="200px" height="150px" alt="Manchester United's Kit Image"></td>
            </tr>
        </table>
        <br><br>
    </marquee>
    <div class="col-2 col-s-2">
        <div class="aside">
       
        </div>
    </div>
     <header> <h1>What We Offer</h1></header>
    <table class="offer">
        <tr>
            <td class="asidecr">
               
                
                <p >Alignment & Collision Repair</p>
                <p >What is wheel alignment?</p>
                
                <p >A wheel alignment consists of adjusting the wheels of your vehicle so that all wheels are parallel to each other and perpendicular to the ground. The front and rear wheels on your vehicle should always be perpendicular to the ground and parallel to the tire beside it. Routine wheel alignments have the potential to save you money in the long run while promoting optimal vehicle performance. </p>
                
            </td>
    
        </tr>
        
        
        
       </table>
       <header> <h1>How Often Should You Change Engine Oil</h1></header>
    <table class="offer">
        <tr>
            <td class="asidecr">
            <p >Depending on vehicle age, type of oil and driving conditions, oil change intervals will vary. It used to be normal to change the oil every 3,000 miles, but with modern lubricants most engines today have recommended oil change intervals of 5,000 to 7,500 miles. Moreover, if your car's engine requires full-synthetic motor oil, it might go as far as 15,000 miles between services! You cannot judge engine oil condition by color, so follow the factory maintenance schedule for oil changes.</p>   
            </td>
    
        </tr>
        
        
        
       </table>

       <header> <h1>What is tire rotation?</h1></header>
    <table class="offer">
        <tr>
            <td class="asidecr">
            <p >Tire rotation is the task of changing the position of the tires on your vehicle—it’s not simply rotating the tires by spinning them on the axle. For example, you might have heard about someone swapping the rear tires with the fronts in a crisscross pattern.

            That’s a basic tire rotation pattern. You want to rotate your tires because the tires are subject to different stresses based on their location. By moving them around from time to time, you prevent those stresses from causing any significant wear issues. </p>
                
            </td>
    
        </tr>
        
        
        
       </table>

       <header> <h1>Your Car’s Paint Job Is Not a DIY Project</h1></header>
    <table class="offer">
        <tr>
            <td class="asidecr">
            <p >You want to paint your living room? DIY! You are interested in putting in an herb garden? DIY!You need to fix a slow drain in your shower? DIY (and blame anyone with a lot of hair in your household for clogging it up). There are endless do-it-yourself projects that are worthwhile, cost-saving, effective, and even satisfying at the end of the day. And then there is tackling your car’s paint job. This is not a DIY job. Unless you are a collision or auto body specialist on a day off, this is better left for the pros.</p>       
            </td>
    
        </tr>
        
        
        
       </table>
       <br><br>

       <div class="footer">
        <h3>© 2024, Tires&More LB </h3>
        
    </div>
</body>
</html>
