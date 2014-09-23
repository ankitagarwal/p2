<div>
    <form id="xkcdconfig" action="index.php" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="wordcount" class="col-sm-3"> Enter the number of words (Default: 4, max 9) </label>
            <input type="text" name="wordcount" placeholder="4" >
        </div>

        <div class="form-group">
            <label for="symbolcount" class="col-sm-3">Enter the number of symbols (Default: 0, max 4) </label>
            <input type="text" name="symbolcount" placeholder="0" >
        </div>

        <div class="form-group">
            <label for="numbercount" class="col-sm-3">Enter the number of numbers (Default: 0, max 4) </label>
            <input type="text" name="numbercount" placeholder="0" >
        </div>

        <div class="form-group">
            <label for="formatting" class="col-sm-3">Select formating of words (Default: all lower case) </label>
            <input type="radio" name="formatting" value="0"> all lower case
            <input type="radio" name="formatting" value="1"> ALL UPER CASE
            <input type="radio" name="formatting" value="2"> Came Case
        </div>

        <button type="submit" class="btn btn-default col-sm-offset-2">Generate password</button>
    </form>
