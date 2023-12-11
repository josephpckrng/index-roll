<section class="flexible-block flexible-artists col-lg-<?= get_sub_field('column_width') ?>">
    <div class="filter-container d-flex my-5">
        <label for="genre-filter">Genre:</label>
        <select id="genre-filter">
            <option value="">All</option>
            <option value="Dubstep">Dubstep</option>
            <option value="Disco">Disco</option>
            <option value="Techno">Techno</option>
            <!-- Add more music genre options as needed -->
        </select>
        <br>
        <label for="location-filter">Location:</label>
        <select id="location-filter">
            <option value="">All</option>
            <option value="Manchester">Manchester</option>
            <option value="Newcastle">Newcastle</option>
            <option value="Canada">Canada</option>
            <!-- Add more location options as needed -->
        </select>
    </div>
    <div class="row" id="artists-container">
        <!-- Artists will be dynamically added here -->
    </div>
</section>

<section class="flexible-block flexible-artists col-lg-<?= get_sub_field('column_width') ?>">
    <div class="row" id="artists-container">
        <!-- Artists will be dynamically added here -->
    </div>
</section>



<script>
    // Sample array of artist data
    const artists = [];

    <?php
    $artists = get_sub_field('artist'); // your Relationship field within Flexible Content
    if ($artists) {
        foreach ($artists as $artist) {
            $link = get_permalink($artist);
            $image = array(); // Retrieve the image URL directly from the 'image' ACF field
            if (have_rows('images', $artist)) {
                while (have_rows('images', $artist)) {
                    the_row();
                    $image[] = get_sub_field('image');
                }
            }
            $title = get_the_title($artist);
            $genres = array();
            if (have_rows('genres', $artist)) {
                while (have_rows('genres', $artist)) {
                    the_row();
                    $genres[] = get_sub_field('genre');
                }
            }
            $locations = array();
            if (have_rows('locations', $artist)) {
                while (have_rows('locations', $artist)) {
                    the_row();
                    $locations[] = get_sub_field('location');
                }
            }

            $artistData = array(
                'link' => $link,
                'image' => $image,
                // Retrieve the 'url' property of the image field
                'title' => $title,
                'genres' => $genres,
                'locations' => $locations
            );

            echo 'artists.push(' . json_encode($artistData) . ');';
        }
    }
    ?>

    // Function to filter the artists by genre and location
    function filterArtists() {
        const genreFilter = document.getElementById('genre-filter');
        const locationFilter = document.getElementById('location-filter');
        const selectedGenre = genreFilter.value;
        const selectedLocation = locationFilter.value;

        const filteredArtists = artists.filter(artist => {
            // Check if the artist has genres and locations, and they include the selected genre and location
            return (
                (!selectedGenre || artist.genres && artist.genres.includes(selectedGenre)) &&
                (!selectedLocation || artist.locations && artist.locations.includes(selectedLocation))
            );
        });

        displayArtists(filteredArtists);
    }

    // Function to display the filtered artists
    function displayArtists(filteredArtists) {
        const artistsContainer = document.getElementById('artists-container');
        artistsContainer.innerHTML = '';

        filteredArtists.forEach(artist => {
            const link = artist.link;
            const image = artist.image;
            const title = artist.title;
            const genres = artist.genres;
            const locations = artist.locations;

            const artistCard = document.createElement('a');
            artistCard.href = link;
            artistCard.className = 'col-lg-3';

            const artistCardContainer = document.createElement('div');
            artistCardContainer.className = 'artist-card-container';

            const img = document.createElement('img');
            img.className = 'w-100';
            img.src = image;
            artistCardContainer.appendChild(img);

            const textWrapper = document.createElement('div');
            textWrapper.className = 'text-wrapper p-3';

            const artistTitle = document.createElement('h2');
            artistTitle.textContent = title;
            textWrapper.appendChild(artistTitle);

            const genresContainer = document.createElement('div');
            genresContainer.className = 'genres d-flex';

            const genreTitle = document.createElement('h6');
            genreTitle.className = 'genre-title';
            genreTitle.textContent = 'Genre(s) :';
            genresContainer.appendChild(genreTitle);

            const genreWrapper = document.createElement('div');
            genreWrapper.className = 'genre-wrapper d-flex';

            if (genres) {
                genres.forEach(genre => {
                    const genreElement = document.createElement('div');
                    genreElement.className = 'genre';
                    genreElement.textContent = genre;
                    genreWrapper.appendChild(genreElement);
                });
            }

            genresContainer.appendChild(genreWrapper);
            textWrapper.appendChild(genresContainer);

            const locationTitle = document.createElement('h6');
            locationTitle.className = 'location-title';
            locationTitle.textContent = 'Location(s) :';
            textWrapper.appendChild(locationTitle);

            const locationWrapper = document.createElement('div');
            locationWrapper.className = 'location-wrapper d-flex';

            if (locations) {
                locations.forEach(location => {
                    const locationElement = document.createElement('div');
                    locationElement.className = 'location';
                    locationElement.textContent = location;
                    locationWrapper.appendChild(locationElement);
                });
            }

            textWrapper.appendChild(locationWrapper);

            const linkOut = document.createElement('div');
            linkOut.className = 'link-out';
            linkOut.style.textAlign = 'right';
            linkOut.style.width = '100%';
            linkOut.textContent = 'View More';
            textWrapper.appendChild(linkOut);

            artistCardContainer.appendChild(textWrapper);
            artistCard.appendChild(artistCardContainer);
            artistsContainer.appendChild(artistCard);
        });
    }

    // Add event listeners to the filter inputs
    const genreFilter = document.getElementById('genre-filter');
    genreFilter.addEventListener('change', filterArtists);

    const locationFilter = document.getElementById('location-filter');
    locationFilter.addEventListener('change', filterArtists);

    // Initially display all artists
    displayArtists(artists);
</script>