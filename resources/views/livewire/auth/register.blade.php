<div x-data="{etudiant:false}">



    <div class="flex flex-col items-center min-h-screen pt-4 bg-gray-100 sm:justify-center sm:pt-0">
        <div>
            <x-authentication-card-logo />
        </div>

        <div x-show="!etudiant"
            class="w-full px-3 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
            <div>

                <div>
                    <h1>S'inscrire en tant que <a href="#" @click="etudiant=true" href="">etudiant ?</a></h1>
                </div>

                <div x-show="!etudiant">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block w-full mt-1" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block w-full mt-1" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block w-full mt-1" type="password" name="password"
                                required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms
                                            of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy
                                            Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="ml-4">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>




            </div>
        </div>


        <div class="w-full px-3 py-4 mt-6 overflow-hidden lg:max-w-3xl" x-show="etudiant">

            <x-card title="Personal Information">


                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <x-input label="Nom" placeholder="First Name" wire:model.defer="etudiant.nom" />
                    <x-input label="Matricule" placeholder="Matricule" wire:model.defer="matricule" />

                    <x-input label="PostNom" placeholder="PostNom" wire:model.defer="etudiant.postnom" />
                    <x-input label="Prenom" placeholder="Prenom" wire:model.defer="etudiant.prenom" />
                    <div class="col-span-1 sm:col-span-2">
                        <x-select label="Select Statuses" placeholder="Select many statuses"
                            :options="['Sciences informatique', 'Droit', 'Economie et Developement', 'Done']"
                            wire:model.defer="etudiant.faculte" />
                    </div>
                    <div class="col-span-1 sm:col-span-2">
                        <x-input label="Email" placeholder="example@mail.com" wire:model.defer="email" />
                    </div>

                    <div class="col-span-1 sm:col-span-2">
                        <x-inputs.password label="Mot de passe" placeholder="" wire:model.defer="etudiant.password" />
                    </div>
                    <div class="col-span-1 sm:col-span-2">
                        <x-inputs.password label="Mot de passe Confirmation" placeholder=""
                            wire:model.defer="etudiant.password_confirmation" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                    class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms
                                    of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                    class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy
                                    Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>

                    @endif

                </div>

                <x-slot name="footer">
                    <div class="flex items-center justify-end gap-x-3">
                        <x-button wire:click="cancel" label="Cancel" flat />
                        <x-button wire:click="register" label="register" spinner="register" primary />
                    </div>
                </x-slot>
            </x-card>
        </div>

    </div>
</div>
