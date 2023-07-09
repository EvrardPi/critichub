<div class="container-60">
    <div class="create-review">
        <h2 class="white-text">Écrivez votre avis ici</h2> 
        
        <div class="create-review-mark">
            <h3 class="white-text">Sélectionnez une note</h3>
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
        </div>

        <div class="create-review-description">
            <button class="button button-create-review">
                Description
            </button>

            <textarea id="descriptionHolder" placeholder="Entrez une description" value=""></textarea>

            <button class="button button-create-review">
                Preview
            </button>

            <div id="create-review-preview" class="create-review-preview"></div>

        </div>


        <div class="create-review-confirmation-button">
            <a href="review-uploaded"><button class="button button-upload-review">Envoyer le commentaire</button></a> 
        </div>

    </div>

</div>

<script src="/assets/js/reviews/preview-generator.js"></script>