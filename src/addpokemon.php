<?php session_start(); 
				if(!isset($_SESSION['privilege'])){
					echo "<script>
						alert('Sesion no encontrada, por favor inicie session antes de entrar en esta pagina.');
						window.location.href='../../login.php';
					</script>";  
				}
				if ($_SESSION['privilege']!="admin"){
						echo "<script>
						alert('El usuario no tiene permisos para entrar en esta pagina.');
						window.location.href='../../index.php';
					</script>";  
				}



?>


<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/css.css">
    <script src="js/javacript.js"></script>
    <title>SAR Projecto 3 Pokedex</title>
</head>
<body>

<!-- MENU inicio -->
<?php require("phpscripts/other/menu.php"); ?>
<!-- MENU fin -->
<!-- CENTRO inicio -->
<div class="container">
    <div id="page-content-wrapper">
        <!-- CONTENIDO inicio -->
        <div class="container-fluid top">
            <div class="bg-light pad">
                <form action="phpscripts/pokedex/addpokemon.php" method="POST">
                    <h3>Añadir pokémon</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="pokedex_number">Número pokedex</label>
                                <input type="text" required class="form-control" name="pokedex_number" id="pokedex_number" placeholder="Número pokedex">     
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="generation">Generación</label>
                                <select class="form-control" name="generation" id="generation">
                                    <option value="1">Generación 1</option>
                                    <option value="2">Generación 2</option>
                                    <option value="3">Generación 3</option>
                                    <option value="4">Generación 4</option>
                                    <option value="5">Generación 5</option>
                                    <option value="6">Generación 6</option>
                                    <option value="7">Generación 7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="legendary">Legendario</label>
                                <select class="form-control" name="legendary" id="legendary">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" required class="form-control" name="name" id="name"
                                       placeholder="Nombre del pokemon">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name_jp">Nombre en Japonés</label>
                                <input type="text" required class="form-control" name="name_jp" id="name_jp"
                                       placeholder="Nombre del pokemon en Japonés">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="weight">Masa del pokemon</label>
                                <input type="number" min="0" required class="form-control" name="weight" id="weight"
                                       placeholder="Masa del pokemon en kg">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="height">Altura del pokemon</label>
                                <input type="number" min="0" required class="form-control" name="height" id="height"
                                       placeholder="Altura del pokemon en m">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="male_percentage">Porcentaje de machos (-1 para sin sexo)</label>
                                <input type="number" min="-1" required class="form-control" name="male_percentage" id="male_percentage"
                                       placeholder="Porcentaje de machos">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type1">Tipo 1</label>
                                <select class="form-control" name="type1" id="type1">
                                    <?php
                                        $type = array('nan', 'poison', 'dragon', 'fire', 'ghost', 'bug', 'rock', 'fighting', 'ice', 'psychic', 'steel', 'water', 'fairy', 'dark', 'normal', 'electric', 'ground', 'flying', 'grass');
                                        foreach ($type as &$tipo){
                                            echo('<option value="'.$tipo.'">'.$tipo.'</option>');
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type2">Tipo 2</label>
                                <select class="form-control" name="type2" id="type2">
                                    <?php
                                        $type = array('nan', 'poison', 'dragon', 'fire', 'ghost', 'bug', 'rock', 'fighting', 'ice', 'psychic', 'steel', 'water', 'fairy', 'dark', 'normal', 'electric', 'ground', 'flying', 'grass');
                                        foreach ($type as &$tipo){
                                            echo('<option value="'.$tipo.'">'.$tipo.'</option>');
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="classification">Clasificación</label>
                                <select class="form-control" name="classification" id="classification">
                                <?php
                                $array = array('Seed Pokémon', 'Lizard Pokémon', 'Flame Pokémon', 'Tiny Turtle Pokémon', 'Turtle Pokémon', 'Shellfish Pokémon', 'Worm Pokémon', 'Cocoon Pokémon', 'Butterfly Pokémon', 'Hairy Pokémon', 'Poison Bee Pokémon', 'Tiny Bird Pokémon', 'Bird Pokémon', 'Mouse Pokémon', 'Beak Pokémon', 'Snake Pokémon', 'Cobra Pokémon', 'Poison Pin Pokémon', 'Drill Pokémon', 'Fairy Pokémon', 'Fox Pokémon', 'Balloon Pokémon', 'Bat Pokémon', 'Weed Pokémon', 'Flower Pokémon', 'Mushroom Pokémon', 'Insect Pokémon', 'Poison Moth Pokémon', 'Mole Pokémon', 'Scratch Cat Pokémon', 'Classy Cat Pokémon', 'Duck Pokémon', 'Pig Monkey Pokémon', 'Puppy Pokémon', 'Legendary Pokémon', 'Tadpole Pokémon', 'Psi Pokémon', 'Superpower Pokémon', 'Flycatcher Pokémon', 'Jellyfish Pokémon', 'Rock Pokémon', 'Megaton Pokémon', 'Fire Horse Pokémon', 'Dopey Pokémon', 'Hermit Crab Pokémon', 'Magnet Pokémon', 'Wild Duck Pokémon', 'Twin Bird Pokémon', 'Triple Bird Pokémon', 'Sea Lion Pokémon', 'Sludge Pokémon', 'Bivalve Pokémon', 'Gas Pokémon', 'Shadow Pokémon', 'Rock Snake Pokémon', 'Hypnosis Pokémon', 'River Crab Pokémon', 'Pincer Pokémon', 'Ball Pokémon', 'Egg Pokémon', 'Coconut Pokémon', 'Lonely Pokémon', 'Bone Keeper Pokémon', 'Kicking Pokémon', 'Punching Pokémon', 'Licking Pokémon', 'Poison Gas Pokémon', 'Spikes Pokémon', 'Vine Pokémon', 'Parent Pokémon', 'Dragon Pokémon', 'Goldfish Pokémon', 'Starshape Pokémon', 'Mysterious Pokémon', 'Barrier Pokémon', 'Mantis Pokémon', 'Humanshape Pokémon', 'Electric Pokémon', 'Spitfire Pokémon', 'Stagbeetle Pokémon', 'Wild Bull Pokémon', 'Fish Pokémon', 'Atrocious Pokémon', 'Transport Pokémon', 'Transform Pokémon', 'Evolution Pokémon', 'Bubble Jet Pokémon', 'Lightning Pokémon', 'Virtual Pokémon', 'Spiral Pokémon', 'Fossil Pokémon', 'Sleeping Pokémon', 'Freeze Pokémon', 'Genetic Pokémon', 'New Species Pokémon', 'Leaf Pokémon', 'Herb Pokémon', 'Fire Mouse Pokémon', 'Volcano Pokémon', 'Big Jaw Pokémon', 'Scout Pokémon', 'Long Body Pokémon', 'Owl Pokémon', 'Five Star Pokémon', 'String Spit Pokémon', 'Long Leg Pokémon', 'Angler Pokémon', 'Light Pokémon', 'Tiny Mouse Pokémon', 'Star Shape Pokémon', 'Spike Ball Pokémon', 'Happiness Pokémon', 'Little Bird Pokémon', 'Mystic Pokémon', 'Wool Pokémon', 'Aquamouse Pokémon', 'Aquarabbit Pokémon', 'Imitation Pokémon', 'Frog Pokémon', 'Cottonweed Pokémon', 'Long Tail Pokémon', 'Sun Pokémon', 'Clear Wing Pokémon', 'Water Fish Pokémon', 'Moonlight Pokémon', 'Darkness Pokémon', 'Royal Pokémon', 'Screech Pokémon', 'Symbol Pokémon', 'Patient Pokémon', 'Long Neck Pokémon', 'Bagworm Pokémon', 'Land Snake Pokémon', 'Flyscorpion Pokémon', 'Iron Snake Pokémon', 'Mold Pokémon', 'Singlehorn Pokémon', 'Sharp Claw Pokémon', 'Little Bear Pokémon', 'Hibernator Pokémon', 'Lava Pokémon', 'Pig Pokémon', 'Swine Pokémon', 'Coral Pokémon', 'Jet Pokémon', 'Delivery Pokémon', 'Kite Pokémon', 'Armor Bird Pokémon', 'Dark Pokémon', 'Long Nose Pokémon', 'Armor Pokémon', 'Big Horn Pokémon', 'Painter Pokémon', 'Scuffle Pokémon', 'Handstand Pokémon', 'Kiss Pokémon', 'Live Coal Pokémon', 'Milk Cow Pokémon', 'Thunder Pokémon', 'Aurora Pokémon', 'Rock Skin Pokémon', 'Hard Shell Pokémon', 'Diving Pokémon', 'Rainbow Pokémon', 'Time Travel Pokémon', 'Wood Gecko Pokémon', 'Forest Pokémon', 'Chick Pokémon', 'Young Fowl Pokémon', 'Blaze Pokémon', 'Mud Fish Pokémon', 'Bite Pokémon', 'Tiny Racoon Pokémon', 'Rush Pokémon', 'Water Weed Pokémon', 'Jolly Pokémon', 'Carefree Pokémon', 'Acorn Pokémon', 'Wily Pokémon', 'Wickid Pokémon', 'TinySwallow Pokémon', 'Swallow Pokémon', 'Seagull Pokémon', 'Water Bird Pokémon', 'Feeling Pokémon', 'Emotion Pokémon', 'Embrace Pokémon', 'Pond Skater Pokémon', 'Eyeball Pokémon', 'Slacker Pokémon', 'Wild Monkey Pokémon', 'Lazy Pokémon', 'Trainee Pokémon', 'Ninja Pokémon', 'Shed Pokémon', 'Whisper Pokémon', 'Big Voice Pokémon', 'Loud Noise Pokémon', 'Guts Pokémon', 'Arm Thrust Pokémon', 'Polka Dot Pokémon', 'Compass Pokémon', 'Kitten Pokémon', 'Prim Pokémon', 'Deceiver Pokémon', 'Iron Armor Pokémon', 'Meditate Pokémon', 'Discharge Pokémon', 'Cheering Pokémon', 'Firefly Pokémon', 'Thorn Pokémon', 'Stomach Pokémon', 'Poison Bag Pokémon', 'Savage Pokémon', 'Brutal Pokémon', 'Ball Whale Pokémon', 'Float Whale Pokémon', 'Numb Pokémon', 'Eruption Pokémon', 'Coal Pokémon', 'Bounce Pokémon', 'Manipulate Pokémon', 'Spot Panda Pokémon', 'Ant Pit Pokémon', 'Vibration Pokémon', 'Cactus Pokémon', 'Scarecrow Pokémon', 'Cotton Bird Pokémon', 'Humming Pokémon', 'Cat Ferret Pokémon', 'Fang Snake Pokémon', 'Meteorite Pokémon', 'Whiskers Pokémon', 'Ruffian Pokémon', 'Rogue Pokémon', 'Clay Doll Pokémon', 'Sea Lily Pokémon', 'Barnacle Pokémon', 'Old Shrimp Pokémon', 'Plate Pokémon', 'Tender Pokémon', 'Weather Pokémon', 'Color Swap Pokémon', 'Puppet Pokémon', 'Marionette Pokémon', 'Requiem Pokémon', 'Beckon Pokémon', 'Fruit Pokémon', 'Wind Chime Pokémon', 'Disaster Pokémon', 'Bright Pokémon', 'Snow Hat Pokémon', 'Face Pokémon', 'Clap Pokémon', 'Ball Roll Pokémon', 'Ice Break Pokémon', 'Deep Sea Pokémon', 'South Sea Pokémon', 'Longevity Pokémon', 'Rendezvous Pokémon', 'Rock Head Pokémon', 'Endurance Pokémon', 'Iron Ball Pokémon', 'Iron Claw Pokémon', 'Iron Leg Pokémon', 'Rock Peak Pokémon', 'Iceberg Pokémon', 'Iron Pokémon', 'Eon Pokémon', 'Sea Basin Pokémon', 'Continent Pokémon', 'Sky High Pokémon', 'Wish Pokémon', 'DNA Pokémon', 'Tiny Leaf Pokémon', 'Grove Pokémon', 'Chimp Pokémon', 'Playful Pokémon', 'Penguin Pokémon', 'Emperor Pokémon', 'Starling Pokémon', 'Predator Pokémon', 'Plump Mouse Pokémon', 'Beaver Pokémon', 'Cricket Pokémon', 'Flash Pokémon', 'Spark Pokémon', 'Gleam Eyes Pokémon', 'Bud Pokémon', 'Bouquet Pokémon', 'Head Butt Pokémon', 'Shield Pokémon', 'Moth Pokémon', 'Tiny Bee Pokémon', 'Beehive Pokémon', 'EleSquirrel Pokémon', 'Sea Weasel Pokémon', 'Cherry Pokémon', 'Blossom Pokémon', 'Sea Slug Pokémon', 'Blimp Pokémon', 'Rabbit Pokémon', 'Magical Pokémon', 'Big Boss Pokémon', 'Catty Pokémon', 'Tiger Cat Pokémon', 'Bell Pokémon', 'Skunk Pokémon', 'Bronze Pokémon', 'Bronze Bell Pokémon', 'Bonsai Pokémon', 'Mime Pokémon', 'Playhouse Pokémon', 'Music Note Pokémon', 'Forbidden Pokémon', 'Land Shark Pokémon', 'Cave Pokémon', 'Mach Pokémon', 'Big Eater Pokémon', 'Emanation Pokémon', 'Aura Pokémon', 'Hippo Pokémon', 'Heavyweight Pokémon', 'Scorpion Pokémon', 'Ogre Scorp Pokémon', 'Toxic Mouth Pokémon', 'Bug Catcher Pokémon', 'Wing Fish Pokémon', 'Neon Pokémon', 'Frosted Tree Pokémon', 'Magnet Area Pokémon', 'Thunderbolt Pokémon', 'Blast Pokémon', 'Jubilee Pokémon', 'Ogre Darner Pokémon', 'Verdant Pokémon', 'Fresh Snow Pokémon', 'Fang Scorp Pokémon', 'Twin Tusk Pokémon', 'Blade Pokémon', 'Gripper Pokémon', 'Snow Land Pokémon', 'Plasma Pokémon', 'Knowledge Pokémon', 'Willpower Pokémon', 'Temporal Pokémon', 'Spatial Pokémon', 'Lava Dome Pokémon', 'Colossal Pokémon', 'Renegade Pokémon', 'Lunar Pokémon', 'Sea Drifter Pokémon', 'Seafaring Pokémon', 'Pitch-Black Pokémon', 'Gratitude Pokémon', 'Alpha Pokémon', 'Victory Pokémon', 'Grass Snake Pokémon', 'Regal Pokémon', 'Fire Pig Pokémon', 'Mega Fire Pig Pokémon', 'Sea Otter Pokémon', 'Discipline Pokémon', 'Formidable Pokémon', 'Lookout Pokémon', 'Loyal Dog Pokémon', 'Big-Hearted Pokémon', 'Devious Pokémon', 'Cruel Pokémon', 'Grass Monkey Pokémon', 'Thorn Monkey Pokémon', 'High Temp Pokémon', 'Ember Pokémon', 'Spray Pokémon', 'Geyser Pokémon', 'Dream Eater Pokémon', 'Drowsing Pokémon', 'Tiny Pigeon Pokémon', 'Wild Pigeon Pokémon', 'Proud Pokémon', 'Electrified Pokémon', 'Mantle Pokémon', 'Ore Pokémon', 'Compressed Pokémon', 'Courting Pokémon', 'Subterrene Pokémon', 'Hearing Pokémon', 'Muscular Pokémon', 'Judo Pokémon', 'Karate Pokémon', 'Sewing Pokémon', 'Leaf-Wrapped Pokémon', 'Nurturing Pokémon', 'Centipede Pokémon', 'Curlipede Pokémon', 'Megapede Pokémon', 'Cotton Puff Pokémon', 'Windveiled Pokémon', 'Bulb Pokémon', 'Flowering Pokémon', 'Hostile Pokémon', 'Desert Croc Pokémon', 'Intimidation Pokémon', 'Zen Charm Pokémon', 'Blazing Pokémon', 'Rock Inn Pokémon', 'Stone Home Pokémon', 'Shedding Pokémon', 'Hoodlum Pokémon', 'Avianoid Pokémon', 'Spirit Pokémon', 'Coffin Pokémon', 'Prototurtle Pokémon', 'First Bird Pokémon', 'Trash Bag Pokémon', 'Trash Heap Pokémon', 'Tricky Fox Pokémon', 'Illusion Fox Pokémon', 'Chinchilla Pokémon', 'Scarf Pokémon', 'Fixation Pokémon', 'Astral Body Pokémon', 'Cell Pokémon', 'Mitosis Pokémon', 'Multiplying Pokémon', 'White Bird Pokémon', 'Icy Snow Pokémon', 'Snowstorm Pokémon', 'Season Pokémon', 'Sky Squirrel Pokémon', 'Clamping Pokémon', 'Cavalry Pokémon', 'Floating Pokémon', 'Caring Pokémon', 'Attaching Pokémon', 'EleSpider Pokémon', 'Thorn Seed Pokémon', 'Thorn Pod Pokémon', 'Gear Pokémon', 'EleFish Pokémon', 'Cerebral Pokémon', 'Candle Pokémon', 'Lamp Pokémon', 'Luring Pokémon', 'Tusk Pokémon', 'Axe Jaw Pokémon', 'Chill Pokémon', 'Freezing Pokémon', 'Crystallizing Pokémon', 'Snail Pokémon', 'Shell Out Pokémon', 'Trap Pokémon', 'Martial Arts Pokémon', 'Automaton Pokémon', 'Sharp Blade Pokémon', 'Sword Blade Pokémon', 'Bash Buffalo Pokémon', 'Eaglet Pokémon', 'Valiant Pokémon', 'Diapered Pokémon', 'Bone Vulture Pokémon', 'Anteater Pokémon', 'Iron Ant Pokémon', 'Irate Pokémon', 'Torch Pokémon', 'Iron Will Pokémon', 'Cavern Pokémon', 'Grassland Pokémon', 'Cyclone Pokémon', 'Bolt Strike Pokémon', 'Vast White Pokémon', 'Deep Black Pokémon', 'Abundance Pokémon', 'Boundary Pokémon', 'Colt Pokémon', 'Melody Pokémon', 'Paleozoic Pokémon', 'Spiky Nut Pokémon', 'Spiny Armor Pokémon', 'Bubble Frog Pokémon', 'Digging Pokémon', 'Tiny Robin Pokémon', 'Scorching Pokémon', 'Scatterdust Pokémon', 'Scale Pokémon', 'Lion Cub Pokémon', 'Single Bloom Pokémon', 'Garden Pokémon', 'Mount Pokémon', 'Daunting Pokémon', 'Poodle Pokémon', 'Restraint Pokémon', 'Constraint Pokémon', 'Sword Pokémon', 'Royal Sword Pokémon', 'Perfume Pokémon', 'Fragrance Pokémon', 'Cotton Candy Pokémon', 'Meringue Pokémon', 'Revolving Pokémon', 'Overturning Pokémon', 'Two-Handed Pokémon', 'Collective Pokémon', 'Mock Kelp Pokémon', 'Water Gun Pokémon', 'Howitzer Pokémon', 'Generator Pokémon', 'Royal Heir Pokémon', 'Despot Pokémon', 'Tundra Pokémon', 'Intertwining Pokémon', 'Wrestling Pokémon', 'Antenna Pokémon', 'Jewel Pokémon', 'Soft Tissue Pokémon', 'Key Ring Pokémon', 'Stump Pokémon', 'Elder Tree Pokémon', 'Pumpkin Pokémon', 'Ice Chunk Pokémon', 'Sound Wave Pokémon', 'Life Pokémon', 'Destruction Pokémon', 'Order Pokémon', 'Mischief Pokémon (Confined)Djinn Pokémonn (Unbound)', 'Steam Pokémon', 'Grass Quill Pokémon', 'Blade Quill Pokémon', 'Arrow Quill Pokémon', 'Fire Cat Pokémon', 'Heel Pokémon', 'Pop Star Pokémon', 'Soloist Pokémon', 'Woodpecker Pokémon', 'Bugle Beak Pokémon', 'Cannon Pokémon', 'Loitering Pokémon', 'Stakeout Pokémon', 'Larva Pokémon', 'Battery Pokémon', 'Stag Beetle Pokémon', 'Boxing Pokémon', 'Woolly Crab Pokémon', 'Dancing Pokémon', 'Bee Fly Pokémon', 'Wolf Pokémon', 'Small Fry Pokémon', 'Brutal Star Pokémon', 'Donkey Pokémon', 'Draft Horse Pokémon', 'Water Bubble Pokémon', 'Sickle Grass Pokémon', 'Bloom Sickle Pokémon', 'Illuminating Pokémon', 'Toxic Lizard Pokémon', 'Flailing Pokémon', 'Strong Arm Pokémon', 'Posy Picker Pokémon', 'Sage Pokémon', 'Teamwork Pokémon', 'Turn Tail Pokémon', 'Hard Scale Pokémon', 'Sand Heap Pokémon', 'Sand Castle Pokémon', 'Sea Cucumber Pokémon', 'Synthetic Pokémon', 'Meteor Pokémon', 'Blast Turtle Pokémon', 'Roly-Poly Pokémon', 'Disguise Pokémon', 'Gnash Teeth Pokémon', 'Placid Pokémon', 'Sea Creeper Pokémon', 'Scaly Pokémon', 'Land Spirit Pokémon', 'Nebula Pokémon', 'Protostar Pokémon', 'Sunne Pokémon', 'Moone Pokémon', 'Parasite Pokémon', 'Swollen Pokémon', 'Lissome Pokémon', 'Glowing Pokémon', 'Launch Pokémon', 'Drawn Sword Pokémon', 'Junkivore Pokémon', 'Prism Pokémon', 'Artificial Pokémon');

                                foreach ($array as &$class){
										echo('<option value="'.$class.'">'.$class.'</option>');
								    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="capture_rate">Ratio de captura</label>
                                <input type="number" min="0" required class="form-control" name="capture_rate" id="capture_rate"
                                       placeholder="Ratio de captura">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="base_egg_steps">Pasos minimos para abrir el huevo</label>
                                <input type="number" min="0" required class="form-control" name="base_egg_steps"
                                       id="base_egg_steps"
                                       placeholder="Pasos minimos para abrir el huevo">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="abilities">Habilidades</label>
                                <input type="text" required class="form-control" name="abilities"
                                       id="abilities"
                                       placeholder="Habilidades del pokemon">

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="experience_growth">Experiencia para evolucionar</label>
                                <input type="number" min="0" required class="form-control" name="experience_growth"
                                       id="experience_growth"
                                       placeholder="Experiencia para evolucionar">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="base_happiness">Felicidad base</label>
                                <input type="number" min="0" required class="form-control" name="base_happiness"
                                       id="base_happiness"
                                       placeholder="Felicidad base">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hp">Vida</label>
                                <input type="number" min="0" onchange="calcular_total();" required class="form-control" name="hp" id="hp"
                                       placeholder="Vida">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="attack">Ataque</label>
                                <input type="number" min="0" onchange="calcular_total();" required class="form-control" name="attack" id="attack"
                                       placeholder="Ataque">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sp_attack">Ataque especial</label>
                                <input type="number" min="0" onchange="calcular_total();" required class="form-control" name="sp_attack" id="sp_attack"
                                       placeholder="Ataque especial">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="defense">Defensa</label>
                                <input type="number" min="0" onchange="calcular_total();" required class="form-control" name="defense" id="defense"
                                       placeholder="Defensa">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sp_defense">Defensa especial</label>
                                <input type="number" min="0" onchange="calcular_total();" required class="form-control" name="sp_defense" id="sp_defense"
                                       placeholder="Defensa especial">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="speed">Velocidad</label>
                                <input type="number" min="0" onchange="calcular_total();" required class="form-control" name="speed" id="speed"
                                       placeholder="Velocidad">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="base_total">Total</label>
                                <input disabled type="number" min="0" required class="form-control" name="base_total" id="base_total"
                                       placeholder="Total">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="localimage">Link de la imagen (local)</label>
                                <input type="text" required class="form-control" name="localimage" id="localimage"
                                       placeholder="Link de la imagen (local)">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="internetimage">Link de la imagen (internet)</label>
                                <input type="text" required class="form-control" name="internetimage" id="internetimage"
                                       placeholder="Link de la imagen (internet)">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="reset" class="btn btn-danger">Restaurar campos</button>
                    <button type="submit" class="btn btn-primary">Añadir pokemon</button>
                </form>
            </div>
        </div>
        <!-- contenido fin -->
        <!-- Footer inicio-->
        <div class="container-fluid top">
            <?php require("phpscripts/other/footer.php"); ?>
        </div>
        <!-- Footer fin-->
    </div>
</div>
<!-- CENTRO fin -->
</body>
</html>
