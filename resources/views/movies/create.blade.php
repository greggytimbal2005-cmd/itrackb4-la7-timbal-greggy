@extends('layouts.app')

@section('title', 'Add Student')

@section('content')  
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Add Movie</h3>

            <form method="POST" action="{{ route('movies.store') }}">
                @csrf


                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <select type="text" name="Title" class="form-select">
                        <option value="Title">Avatar: Aid of Passage</option>
                        <option value="Title">Mission: Impossible – Legacy Reborn</option>
                        <option value="Title">Wicked: For Good</option>
                        <option value="Title">Quantum Requiem</option>
                        <option value="Title">The Supergirl Movie</option>
                    </select>
                </div>  
                
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <select name="description" class="form-select">
                        <option value="">-- Select a movie description --</option>
                        <option value="1">Jake Sully and Neytiri face new threats in Pandora as they journey beyond familiar waters to protect their family and discover the truth about the Na'vi's ancient past.</option>
                        <option value="2">Ethan Hunt faces his most dangerous mission yet as a rogue AI threatens global security. With his team fragmented and trust nowhere to be found, he must outrun both enemies and time itself.</option>
                        <option value="3">Elphaba and Glinda's extraordinary friendship reaches its climax as the Wicked Witch faces her final battle against the Wizard, revealing shocking truths and unforgettable moments of magic and sacrifice.</option>
                        <option value="4">When a physicist discovers that parallel realities are collapsing into one another, she must navigate quantum dimensions and confront alternate versions of herself to prevent universal extinction.</option>
                        <option value="5">Kara Zor-El discovers her extraordinary powers in modern-day Earth and must embrace her destiny as Supergirl while protecting humanity from cosmic threats and uncovering secrets about her own heritage.</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">duration</label>
                    <select type="text" name="Duration" class="form-select">
                        <option value="mins">178</option>
                        <option value="mins">162</option>
                         <option value="mins">165</option>
                         <option value="mins">155</option>
                         <option value="mins">145</option>
                    </select>
                </div>  

                <div class="mb-3">
                    <label class="form-label">genre</label>
                     <select type="text" name="genre" class="form-select">
                        <option value="Sci-Fi">sci-fi</option>
                        <option value="Musical">musical</option>
                         <option value="Action">Action</option>
                    </select>
                </div>  

                <div class="mb-3">
                    <label class="form-label">featured</label>
                    <select type="text" name="featured" class="form-select">
                        <option value="false">false</option>
                        <option value="true">True</option>
                    </select>
                </div>  

                <div class="mb-3">
                    <label class="form-label">year</label>
                    <select type="text" name="release_year" class="form-select">
                        <option value="year">Select Year</option>
                        <option value="year">2026</option>
                        <option value="year">2025</option>
                    </select>
                </div>  
            </form>
        </div>
            
    </div>
@endsection    

    
        