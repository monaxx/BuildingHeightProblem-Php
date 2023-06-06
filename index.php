<?php
include 'inc/class-autoloader.inc.php';
include 'inc/header.inc.php';

$gridSize = '';
$topValues = $rightValues = $bottomValues = $leftValues = [];
$gridSizeErr = $topErr = $rightErr = $bottomErr = $leftErr = '';

if(isset($_POST['submit'])){
    // Validate grid size
    if(empty($_POST['gridSize'])){
        $gridSizeErr = 'Grid size required';
    }else{
        $gridSize = $_POST['gridSize'];
    }
    // Validate top values
    if(empty($_POST['topValues'])){
        $topErr = 'Top values required';
    }else{
        $topValues = explode(',',$_POST['topValues']);
    }
    // Validate right values
    if(empty($_POST['rightValues'])){
        $rightErr = 'Right values required';
    }else{
        $rightValues = explode(',',$_POST['rightValues']);
    }
    // Validate bottom values
    if(empty($_POST['bottomValues'])){
        $bottomErr = 'Bottom values required';
    }else{
        $bottomValues = explode(',',$_POST['bottomValues']);
    }
    // Validate left values
    if(empty($_POST['leftValues'])){
        $leftErr = 'Left values required';
    }else{
        $leftValues = explode(',',$_POST['leftValues']);
    }

    if(empty($gridSizeErr) && empty($topErr) && empty($rightErr) && empty($bottomErr) && empty($leftErr)){
        $gridSolved = new Grid($gridSize, $topValues, $rightValues, $bottomValues, $leftValues);
        $gridSolved->showSolution();
    }
}
?>
<div class="container p-5">
    <form action="" method="POST">
        <div class="row">
            <div class="col-2">
                <label for="gridSize">Grid size:</label>
                <input type="number" class="form-control <?php echo $gridSizeErr ? 'is-invalid' : null;?>" id="gridSize" name="gridSize" placeholder="4 - means a 4x4 grid" value="<?php echo $_POST['gridSize']?>">
                <div class="invalid-feedback">
                    <?php echo $gridSizeErr; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="topValues">Top values:</label>
                <input type="text" class="form-control <?php echo $topErr ? 'is-invalid' : null;?>" id="topValues" name="topValues" placeholder="e.g.1,2,2,2" value="<?php echo $_POST['topValues']?>">
                <div class="invalid-feedback">
                    <?php echo $topErr; ?>
                </div>
            </div>
            <div class="col">
                <label for="rightValues" name="rightValues">Right values:</label>
                <input type="text" class="form-control <?php echo $rightErr ? 'is-invalid' : null;?>" id="rightValues" name="rightValues" placeholder="e.g.1,2,2,2" value="<?php echo $_POST['rightValues']?>">
                <div class="invalid-feedback">
                    <?php echo $rightErr; ?>
                </div>
            </div>
            <div class="col">
                <label for="bottomValues">Bottom values:</label>
                <input type="text" class="form-control <?php echo $bottomErr ? 'is-invalid' : null;?>" id="bottomValues" name="bottomValues" placeholder="e.g.1,2,2,2" value="<?php echo $_POST['bottomValues']?>">
                <div class="invalid-feedback">
                    <?php echo $bottomErr; ?>
                </div>
            </div>
            <div class="col">
                <label for="leftValues">Left values:</label>
                <input type="text" class="form-control <?php echo $leftErr ? 'is-invalid' : null;?>" id="leftValues" name="leftValues" placeholder="e.g.1,2,2,2" value="<?php echo $_POST['leftValues']?>">
                <div class="invalid-feedback">
                    <?php echo $leftErr; ?>
                </div>
            </div>
            <input type="submit" name="submit" value="Solve" class="btn btn-dark w-10">
        </div>
    </form>
</div>

<?php include 'inc/footer.inc.php'; ?>