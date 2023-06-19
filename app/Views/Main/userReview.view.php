<div class="elementscms">

    <section id="elementsToInput">

        <div class="container container-display">
            <h2 class="white-text">Elements <br> available </h2>
            <div class="empty">
                <span class="fill"><textarea name="" id="" cols="15" rows="2" placeholder="Titre"></textarea></span>
            </div>

            <div class="empty">
                <span class="fill"><textarea name="" id="" cols="15" rows="2" placeholder="Sous-titre"></textarea></span>
            </div>

            <div class="empty">
                <span class="fill"><textarea name="" id="" cols="15" rows="2" placeholder="Description"></textarea></span>
            </div>

            <div class="empty">
                <span class="fill"><img src="/assets/images/logo.svg" alt=""></span>
            </div>

            <div class="empty">
                <span class="fill"><img src="/assets/images/icon-circle-man.png" alt=""></span>
            </div>
        </div>

    </section>

    <section id="cmsArea">
        <h2 class="white-text">Aperçu</h2>
        <div class="cmsArea cmsArea-around">
            <h2>Title</h2>
            <div class="container cmsArea-title">
                <div class="empty"></div>
                <div class="empty"></div>
                <div class="empty"></div>
            </div>

            <h2>Description</h2>
            <div class="container cmsArea-description">
                <div class="empty"></div>
                <div class="empty"></div>
                <div class="empty"></div>
            </div>

            <h2>Rating</h2>
            <form class="rating">
                <label>
                    <input type="radio" name="stars" value="1" />
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="stars" value="2" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="stars" value="3" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="stars" value="4" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    <input type="radio" name="stars" value="5" />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
            </form>
        </div>

    </section>

    <section id="parameters">
        <div class="parameters">
            <nav class="parameters-navbar">
                <div class="parameters-navbar-text">
                    <span id="textElement">Text
                        <hr>
                    </span>
                    <span id="imgElement">Image
                        <hr>
                    </span>
                </div>
                <span id="closeParameters" class="closeParamaters"><b>☓</b></span>
            </nav>

            <div class="parameters-elements">
                <h6>Paragraph Settings</h6>
                <div class="parameters-elements-icons">
                    <i class="fa-regular fa-paragraph"></i>
                    <i class="fa-solid fa-bold"></i>
                    <i class="fa-solid fa-italic"></i>
                    <i class="fa-solid fa-underline"></i>
                    <i class="fa-regular fa-align-left"></i>
                    <i class="fa-regular fa-align-center"></i>
                    <i class="fa-regular fa-align-right"></i>
                </div>

                <hr>

                <h6>Text Settings</h6>
                <div class="parameters-elements-text">
                    <div class="parameters-elements-font parameters-elements-font-size">
                        <span>Font-size</span>
                        <select id="font-size" name="font-size">
                            <option value="400">Default</option>
                            <option value="300">Thin</option>
                            <option value="500">Regular</option>
                            <option value="600">SemiBold</option>
                            <option value="700">Bold</option>
                        </select>
                    </div>


                    <div class="parameters-elements-font">
                        <span>Font-case</span>
                        <div class="parameters-elements-font-case">
                            <span>a</span>
                            <!-- Rounded switch -->
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <span>A</span>
                        </div>
                    </div>
                </div>

                <hr>
                <h6>Color Settings</h6>
                <div class="parameters-elements-colors">
                    <div class="parameters-elements-font">
                        <span>Background Color</span>
                        <div class="parameters-elements-colors-dots">
                            <div class="circle circle-1"></div>
                            <div class="circle circle-2"></div>
                            <div class="circle circle-3"></div>
                            <div class="circle circle-4"></div>
                            <div class="circle circle-5"></div>
                        </div>
                    </div>

                </div>

                <div class="parameters-elements-end">
                    <input type="reset" value="Reset" class="button button-reset"></input>
                </div>
            </div>

        </div>
    </section>
    <script src="/assets/js/cms_move_elements.js"></script>
    <script>
        $(':radio').change(function() {
            console.log('New star rating: ' + this.value);
        });
    </script>
</div>