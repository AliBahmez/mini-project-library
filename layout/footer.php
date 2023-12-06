 <!-- *************************************** -->
 <section id="About" class="info_section ">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="info_contact">
                <h5>
                  About Shop
                </h5>
                <div>
                  <div class="img-box">
                    <img src="images/location-white.png" width="18px" alt="">
                  </div>
                  <p>
                    Yemen-Hadramout-Mukalla
                  </p>
                </div>
                <div>
                  <div class="img-box">
                    <img src="images/telephone-white.png" width="12px" alt="">
                  </div>
                  <p>
                    +967 774514428
                  </p>
                </div>
                <div>
                  <div class="img-box">
                    <img src="images/envelope-white.png" width="18px" alt="">
                  </div>
                  <p>
                    alisaeedbahmez@gmail.com
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info_info">
                <h5>
                  Informations
                </h5>
                <p>
                  ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                </p>
              </div>
            </div>
    
            <!-- <div class="col-md-3"> -->
              <!-- <div class="info_insta">
                <h5>
                  Instagram
                </h5>
                <div class="insta_container">
                  <div>
                    <a href="">
                      <div class="insta-box b-1">
                        <img src="images/insta.png" alt="">
                      </div>
                    </a>
                    <a href="">
                      <div class="insta-box b-2">
                        <img src="images/insta.png" alt="">
                      </div>
                    </a>
                  </div>
    
                  <div>
                    <a href="">
                      <div class="insta-box b-3">
                        <img src="images/insta.png" alt="">
                      </div>
                    </a>
                    <a href="">
                      <div class="insta-box b-4">
                        <img src="images/insta.png" alt="">
                      </div>
                    </a>
                  </div>
                  <div>
                    <a href="">
                      <div class="insta-box b-3">
                        <img src="images/insta.png" alt="">
                      </div>
                    </a>
                    <a href="">
                      <div class="insta-box b-4">
                        <img src="images/insta.png" alt="">
                      </div>
                    </a>
                  </div>
                </div>
              </div> -->
            <!-- </div> -->
            <div class="col-md-4 w-100">
              <div class="info_form ">
                <h5>
                  Contact Us
                </h5>
                <form action="">
                  <!-- <input type="text" placeholder="Enter your Notes"> -->
                  <textarea class="p-2" name="" id="" cols="40" rows="5" placeholder="Enter your Notes"></textarea>
                  <button>
                    Subscribe
                  </button>
                </form>
                <div class="social_box">
                  <a href="">
                    <img src="images/fb.png" alt="">
                  </a>
                  <a href="">
                    <img src="images/twitter.png" alt="">
                  </a>
                  <a href="">
                    <img src="images/linkedin.png" alt="">
                  </a>
                  <a href="">
                    <img src="images/youtube.png" alt="">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
      <!-- end info_section -->
    
    
      <!-- footer section -->
      <section class="container-fluid footer_section">
        <p>
          &copy; 2023 All Rights Reserved By
          <a href="#">Ali Bahmuz</a>
          Distrubuted By <a href="https://themewagon.com">Web Bootcamp</a>
        </p>
      </section>

      <script>
        // Get the modal element
        const modal = document.getElementById("loginModal");
        // Get the button that opens the modal
        const openModalBtn = document.getElementById("openModalBtn");
        // Get the <span> element that closes the modal
        const closeSpan = document.getElementsByClassName("close")[0];

        // Function to open the modal
        function openModal() {
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Event listeners
        openModalBtn.addEventListener("click", openModal);
        closeSpan.addEventListener("click", closeModal);
        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });
        
      </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>