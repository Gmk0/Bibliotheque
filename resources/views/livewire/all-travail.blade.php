<div x-data="{show:false}" class="min-h-screen pt-16">

    <div class="px-3 lg:px-0">
        <div class="w-full p-5 mx-auto bg-white rounded-lg shadow md:w-2/3">
            <div class="relative">
                <div class="absolute flex items-center h-full ml-2">
                    <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z">
                        </path>
                    </svg>
                </div>

                <input type="text" wire:model.debounce='search' placeholder="Recherche le titre"
                    class="w-full px-8 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
            </div>

            <div class="flex items-center justify-between mt-4">
                <button @click="show=!show"
                    class="px-4 py-2 text-sm font-medium text-gray-800 bg-gray-100 rounded-md hover:bg-gray-200">

                    <span x-show="show">Desactiver Filter</span>
                    <span x-show="!show">Activer Filter</span>
                </button>

                <button class="px-4 py-2 text-sm font-medium text-gray-800 bg-gray-100 rounded-md hover:bg-gray-200">
                    Reset Filter
                </button>
            </div>

            <div x-show="show">
                <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-3 xl:grid-cols-4">
                    <select
                        class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        <option value="">All Categorie</option>
                        <option value="for-rent">These</option>
                        <option value="for-sale">Memoire</option>
                    </select>

                    <select
                        class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        <option value="">Domaine</option>

                    </select>

                    <select
                        class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        <option value="">Annee Publication</option>
                        <option value="1000">RM 1000</option>
                        <option value="2000">RM 2000</option>
                        <option value="3000">RM 3000</option>
                        <option value="4000">RM 4000</option>
                    </select>

                    <select
                        class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        <option value="">Faculte</option>
                        <option value="200">200 sq.ft</option>
                        <option value="400">400 sq.ft</option>
                        <option value="600">600 sq.ft</option>
                        <option value="800 sq.ft">800</option>
                        <option value="1000 sq.ft">1000</option>
                        <option value="1200 sq.ft">1200</option>
                    </select>


                </div>
            </div>
        </div>
    </div>
    <div class="p-6 mx-6">
        <div class="flex items-start justify-start py-4">
            <h1 class="text-xl">
                Resultat: {{count($travauxCount)}} travaux
            </h1>

        </div>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            @foreach ($travaux as $travails)


            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                <div class="relative bg-slate-300">
                    <div class="p-4">
                        <img class="object-cover object-center w-full h-40 rounded-md" src="/images/travaux.png"
                            alt="Image d'illustration">


                    </div>

                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <p>{{$travails->etudiant->nom}}</p>
                        <span
                            class="inline-block px-2 py-1 text-xs font-semibold tracking-wide text-white uppercase bg-gray-400 rounded-full">343
                            vues</span>
                    </div>

                    <h3 class="mt-2 text-xl font-bold">{{$travails->titre}}</h3>
                    <p class="mt-1 text-gray-600">{{$travails->domaine->intitule}}</p>
                    <p class="mt-1 text-gray-600">Faculte: {{$travails->etudiant->faculte}}</p>
                </div>
                <div class="px-4 py-2 text-center bg-gray-100">
                    <a href="{{route('voirTravail',[$travails->matricule])}}"
                        class="font-semibold text-blue-500">Voir</a>
                </div>
            </div>




            @endforeach


            <!-- Ajouter d'autres cartes ici selon vos besoins -->
        </div>



    </div>
</div>
