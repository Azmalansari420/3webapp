<div class="modal fade add-modal" id="add-story-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Add Story</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <ul class="story-list">
            <li>
              <div class="story-types-box">
                <div class="story-image">
                  <img src="<?=base_url() ?>assets/images/icons/gallery.png" alt="gallery">
                </div>
                <h5>Select From Gallery</h5>
              </div>
            </li>
            <li>
              <div class="story-types-box">
                <div class="story-image">
                  <img src="<?=base_url() ?>assets/images/icons/camera.png" alt="camera">
                </div>
                <h5>Open Camera</h5>
              </div>
            </li>
            <li>
              <div class="story-types-box">
                <div class="story-image">
                  <img src="<?=base_url() ?>assets/images/icons/text.png" alt="text">
                </div>
                <h5>Write Text</h5>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <!-- story section start -->
  <div class="story-slider">
    <div data-slide="slide" class="slider">
      <div class="slider-items">
        <img class="img-fluid story-img active" src="<?=base_url() ?>assets/images/story-img.html" alt="story-img">
        <img class="img-fluid story-img" src="<?=base_url() ?>assets/images/story-img.html" alt="story-img">
        <img class="img-fluid story-img" src="<?=base_url() ?>assets/images/story-img.html" alt="story-img">
      </div>

      <nav class="slider-nav">
        <div class="slider-thumb"></div>
        <button class="slider-prev">Previous</button>
        <button class="slider-next">Next</button>
      </nav>
    </div>
  </div>
  <!-- story section end -->
