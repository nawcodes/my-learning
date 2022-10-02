<div class="main-content-inner">



    <!-- Button trigger modal -->
    <?= validation_errors(); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="my-2">
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target=".film-modal-xl">
            Add film
        </button>
    </div>



    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">release</th>
                <th scope="col">language</th>
                <th scope="col">length</th>
                <th scope="col">rating</th>
                <th scope="col">image</th>
                <th scope="col">network</th>
                <th scope="col">type</th>
                <th scope="col">vote</th>   
                <th scope="col">release_date</th>
                <th scope="col">last_update</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($film as $f) :  ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $f['title']; ?></td>
                    <td><?= substr($f['description'], 0 , 20) . "..."; ?></td>
                    <td><?= $f['release_year']; ?></td>
                    <td><?= $f['language']; ?></td>
                    <td><?= $f['length']; ?></td>
                    <td><?= $f['rating']; ?></td>
                    <td><?= $f['image']; ?></td>
                    <td><?= $f['network']; ?></td>
                    <td><?= $f['type']; ?></td>
                    <td><?= $f['vote']; ?></td>
                    <td><?= $f['release_date']; ?></td>
                    <td><?= $f['last_update']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>film/update_film/<?= $f['id']; ?>" class=" badge badge-primary">update</a>
                        <a href="<?= base_url(); ?>film/delete_film/<?= $f['id']; ?>" class=" badge badge-danger" onclick="return confirm('want to delete this film?');">delete</a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>


</div>
<!-- row area start-->
</div>
</div>
<!-- main content area end -->

<!-- Modal -->
<div class="modal fade film-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filmModalCenterTitle">Add film</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('film');?>
             <div class="col-sm-12">
             <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title film...">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                   <div class="form-group">
                       <label for="release year">release year</label>
                       <input class="date-own form-control"  type="text" name="release_year" id="release_year">
                    </div>
                    <div class="form-group">
                        <label for="language_name">language_name</label>
                        <select class="form-control" id="language_name" name="language_name" data-live-search="true" multiple >
                        <?php foreach($lang as $l ) : ?>
                        <option value="<?= $l['name'];?>"><?= $l['name'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                       <div class="form-group">
                        <label for="lengt">lengt</label>
                        <input type="text" class="form-control" id="length" name="length" placeholder="ex:45 (Minute) ">
                    </div>
                </div>
                <div class="col-sm-6">
                      <div class="form-group">
                        <label for="rating">rating</label>
                        <select class="form-control" id="rating" name="rating" data-live-search="true" >
                        <option value="">. . .</option>
                        <?php foreach($rating as $r ) : ?>
                        <option value="<?=$r['name'];;?>"><?=$r['name'];;?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="network">network</label>
                        <select class="form-control" id="network" name="network" data-live-search="true">
                        <option value="">. . .</option>
                        <?php foreach($network as $n ) : ?>
                        <option value="<?= $n['name'];?>"><?= $n['name'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">type</label>
                        <select class="form-control" id="type" name="type">
                         <?php foreach($type as $t ) : ?>
                        <option value="<?= $t;?>"><?= $t;?></option>
                         <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vote">vote</label>
                        <input type="text" class="form-control" id="vote" name="vote" placeholder="ex:1000 (likes)">
                    </div>
                     <div class="form-group">
                       <label for="release date">release date</label>
                       <input class="form-control"  type="text" name="release_date" id="release_date">
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                     <label class="custom-file-label" for="Choose file">Choose file</label>
                    </div>
                </div>
              </div>
             </div>
                <input type="hidden" class="form-control" id="hide_lang" name="hide_lang" >
                <input type="hidden" class="form-control" id="last_update" name="last_update" >
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Film</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end menu modal -->