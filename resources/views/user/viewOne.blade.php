<x-app-layout>

    <div class="flex min-h-screen mx-auto">
        <div class="w-1/2">
            <!-- Section d'affichage des informations du travail -->
            <div class="p-4 bg-white border border-gray-200 rounded">
                <h2 class="mb-4 text-2xl font-bold">Informations du travail</h2>
                <p class="mb-2"><strong>Sujet :</strong> {{ $travail->titre }}</p>
                <p class="mb-2"><strong>Catégorie :</strong> {{ $travail->categorie }}</p>
                <p class="mb-2"><strong>Domaine :</strong> {{ $travail->domaine->intitule }}</p>
                <p class="mb-2"><strong>Étudiant :</strong> {{ $travail->etudiant->nom }}</p>
                <p class="mb-2"><strong>Nombre de vues :</strong> {{ $travail->viewCount }}</p>
                <p><strong>Description :</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione totam
                    vero, unde
                    pariatur dolores, dolore commodi accusamus sint, nulla architecto vel adipisci ipsam veritatis. Rem
                    nostrum
                    aperiam est assumenda commodi?</p>
            </div>
        </div>
        <div class="w-1/2 ">
            <!-- Section de visualisation des fichiers PDF -->
            <div class="p-4 bg-white">
                <div id="viewer" style="width: 100%; height: 500px;"></div>
                <!-- Insérez les balises HTML nécessaires pour afficher les fichiers PDF -->
                <!-- Appliquez les classes Tailwind CSS pour le positionnement et le style -->
            </div>
        </div>
    </div>



    @push('script')
    <script type="text/javascript" src="https://cloudpdf.io/viewer.min.js"></script>
    <script>
        const config = {
        documentId: 'dcc79b40-d369-4f5c-b880-4de03d103668',
        darkMode: true,
      };
      CloudPDF(config, document.getElementById('viewer')).then((instance) => {

      });
    </script>

    @endpush
</x-app-layout>