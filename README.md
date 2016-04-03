# BlogStarRating
Add Star Field to RainLab.blog

Rating field is in the secondary tab


I used created these classes to create the stars:

    .star0,.star1,.star2,.star3,.star4,.star5,.star6,.star7,.star8,.star9,.star10{
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    -webkit-text-stroke: 1px black;}
    .star0:after{content: "\f006 \f006 \f006 \f006 \f006";}
    .star1:after{content: "\f123 \f006 \f006 \f006 \f006";}
    .star2:after{content: "\f005 \f006 \f006 \f006 \f006";}
    .star3:after{content: "\f005 \f123 \f006 \f006 \f006";}
    .star4:after{content: "\f005 \f005 \f006 \f006 \f006";}
    .star5:after{content: "\f005 \f005 \f123 \f006 \f006";}
    .star6:after{content: "\f005 \f005 \f005 \f006 \f006";}
    .star7:after{content: "\f005 \f005 \f005 \f123 \f006";}
    .star8:after{content: "\f005 \f005 \f005 \f005 \f006";}
    .star9:after{content: "\f005 \f005 \f005 \f005 \f123";}
    .star10:after{content: "\f005 \f005 \f005 \f005 \f005";}


and I used this code to place the stars.

    <span class="star{{ post.rating.rating }}"></span>
  
I'm currently working the component end. This functions as intended for now and will recieve imporvements.
