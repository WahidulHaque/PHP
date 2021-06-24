<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB TASK 2</title>
</head>
<body>
    <form action="validation.php" method="post">
        <fieldset>
            <legend>Name</legend>
            <input type="text" name="name">
        </fieldset>
        <fieldset>
            <legend>Email</legend>
            <input type="email" name="email">
        </fieldset>
        <fieldset>
            <legend>Date Of Birth</legend>
            <input type="text" name="day" placeholder="dd">/
            <input type="text" name="month" placeholder="mm">/
            <input type="text" name="year" placeholder="year">
        </fieldset>
        <fieldset>
            <legend>Gender</legend>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other
        </fieldset>
        <fieldset>
            <legend>Degree</legend>
            <input type="checkbox" name="degree[]" value="SSC"> SSC
            <input type="checkbox" name="degree[]" value="HSC"> HSC
            <input type="checkbox" name="degree[]" value="BSc"> BSc
            <input type="checkbox" name="degree[]" value="MSc"> MSc
        </fieldset>
        <fieldset>
            <legend>Blood Group</legend>
            <select name="bloodGroup" id="">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O-">O-</option>
                <option value="O+">O+</option>
            </select>
        </fieldset>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>