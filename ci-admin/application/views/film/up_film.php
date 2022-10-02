<div class="main-content-inner">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">Update film</h5>
                <div class="card-body">
                    
                 <?= form_open_multipart('film/update_film', );?>
                    <input type="hidden" id="id" name="id" value="<?= $film['id']; ?>">
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title . ." value="<?= $film['title']; ?>">
                        <?= form_error('title', '<div class="text-danger ml-1">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input  class="form-control" id="description" name="description" style="padding-bottom:100px" value="<?= $film['description'];?>"></textarea>
                        <?= form_error('description', '<div class="text-danger ml-1">', '</div>'); ?>
                    </div>
                     <div class="form-group">
                       <label for="release year">release year</label>
                       <input class="date-own form-control"  type="text" name="release_year" id="release_year" value="<?= $film['release_year'];?>">
                       <?= form_error('release_year', '<div class="text-danger ml-1">', '</div>'); ?>
                     </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                        <label for="language_name">language_name</label>
                        <select class="form-control" id="up_language" name="up_language" data-live-search="true" multiple>
                        <?php foreach($lang as $l ) : ?>
                        <option value="<?= $l['name'];?>"><?= $l['name'];?></option>
                        <?php endforeach;?>
                        </select>
                        </div>
                        <div class="col-sm-6">
                        <label for="value_lang">value_lang</label>
                        <input type="hidden" name="up_lang">
                        <input type="text" class="form-control" value="<?= $film['language']; ?>" disabled >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="lengt">lengt</label>
                        <input type="text" class="form-control" id="length" name="length" placeholder="ex:45 (Minute) " value="<?=$film['length']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rating">rating</label>
                        <select class="form-control" id="rating" name="rating" data-live-search="true" >
                        <?php foreach($rating as $r ) : ?>
                        <?php if ($r['name'] == $film['rating']) : ?>
                        <option value="<?=$r['name'];?>" selected><?=$r['name'];?></option>
                        <?php else :?>
                        <option value="<?=$r['name'];?>"><?=$r['name'];?></option>
                        <?php endif;?>
                        <?php endforeach;?>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="network">network</label>
                        <select class="form-control" id="network" name="network" data-live-search="true">
                        <?php foreach($network as $n ) : ?>
                        <?php if ($n['name'] == $film['network']) : ?>
                        <option value="<?= $n['name'];?>" selected><?= $n['name'];?></option>
                        <?php else : ?>
                        <option value="<?= $n['name'];?>"><?= $n['name'];?></option>
                        <?php endif;?>                        
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">type</label>
                        <select class="form-control" id="type" name="type">
                        <?php foreach($type as $t ) : ?>
                        <?php if ($t == $film['type']) : ?>
                        <option value="<?= $t;?>" selected><?= $t;?></option>
                        <?php else : ?>
                        <option value="<?= $t;?>"><?= $t;?></option>
                        <?php endif;?>                        
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vote">vote</label>
                        <input type="text" class="form-control" id="vote" name="vote" placeholder="ex:1000 (likes)" value="<?= $film['vote'];?>">
                        <?= form_error('vote', '<div class="text-danger ml-1">', '</div>'); ?>
                    </div>
                     <div class="form-group">
                       <label for="release date">release date</label>
                       <input class="form-control"  type="text" name="release_date" id="release_date" value="<?= $film['release_date'];?>">
                       <?= form_error('release_date', '<div class="text-danger ml-1">', '</div>'); ?>
                    </div>
                     <div class="form-group row">
                        <div class="col-sm-2">Picture</div>
                        <div class="col-sm-10">
                            <div class="row">
                            <div class="col-sm-3">
                            <img src="<?= base_url('version/images/film/') . $film['image'];?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image"  name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                    <a href="<?= base_url('film'); ?>" type="button" class="btn btn-secondary">back</a>
                    <button type="submit" class="btn btn-primary">Update film</button>
                    </div>
                    </form> 
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- row area start-->
</div>
</div>
<!-- main content area end -->


