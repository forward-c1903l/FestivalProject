<div class="container">       
    <section class="admin-all-religions block-religions">
        <div class='title'>
            <h6>Add Religion</h6>
        </div>
        <div class='religion_main'>
            <form action="">
                <div class='group'>
                    <label for="name_reli">Name: </label>
                    <input type="text" name='name_religion' id='name_reli'/>
                    <span class='error' id='error_name'></span>
                </div>
                <div class='group'>
                    <label for="img_reli">Image: </label>
                    <input
                    ref='inputFile' 
                    type="file" name='img_religion' id='img_reli'/> 
                    <span class='error' id='error_image'></span>
                </div>
                <button type="button" id='submit-add-reli'>Add Religion</button>
            </form>
        </div>
    </section>
</div>
