<style>
    .space {
    min-height: 5vh;
}

.titles {
    text-align: center;
    font-size: 2.5rem;
    font-weight: bold;
    color: rgb(79, 6, 6);
}

.heading {
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
}

.section__container {
    background-color: wheat;
    width: 100%;
    max-width: 1000px;
    margin: auto;
    padding: 1rem;
    text-align: center;

}



.testimonials__grid {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    margin-bottom: 2rem;

}

.card {
    padding: 2rem;
    display: grid;
    gap: 1rem;
    border-radius: 5px;
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    /* width: 200px; */
   

}

.card i {
    font-size: 1rem;
    color: gold;
}

.card p {
    font-size: 1.2rem;
    font-weight: 500;
}

.card hr {
    width: 40px;
    margin: auto;
    color: var(--text-light);
}

.card img {
    width: 60px;
    height: 60px;
    margin: auto;
    border-radius: 100%;
    border: 1px solid black;
}

.card .name {
    font-size: 1.5rem;
    font-weight: 400;
    color: black;
    transition: 0.3s;
}

.card .name:hover {
    color: black;
}
.card:hover {
    transform: scale(1.05);
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2); 
}
</style>
<div class="space"></div>

<div class="heading"><span class="titles">OUR TESTIMONIALS</span>
<section class="section__container">
    <div class="testimonials__grid">
        <?php
        for ($i = 0; $i < 3; $i++) {
            echo '
        
            <div class="card">
            <span><i class="fas fa-quote-left"></i></span>
            <img src="images/11.jpg" alt="user" />
            <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            </div>
                <p class="name">Allan Collins</p>
                <hr />
                <p>
                    I\'ve been working with these guys for a long time and I can say that
                    my house is in the perfect hands.
                </p>
               
               
            
            </div>
       
    ';
        }
        ?>
    </div>
</section>
</div>