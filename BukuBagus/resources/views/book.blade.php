<?php
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
?>
@extends('layouts.main')
@section('container')
  <div class="max-w-lg">
    <h1 class="text-2xl font-semibold">{{ $book->title }}</h1>
    <p>By {{ $book->authors }}</p>
    {{-- Review sum --}}
    <div class="rating flex items-center gap-2">
      {{-- rating --}}
      @if ($book->totalRating != '0')
        <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" />
        <p>{{ $book->avgRating }} <span class="text-slate-500">({{ $book->totalRating }} Rating)</span></p>
      @else
        <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" />
        <p class="text-slate-500">Belum ada rating</p>
      @endif
      <div class="mb-1 font-mono text-2xl leading-none">.</div>
      @if ($book->toalReviews == 0)
        <p class="text-slate-500">Belum ada review</p>
      @else
        <p>{{ $book->totalReviews }} Review</p>
      @endif
    </div>
    <div id="user-action" class="flex justify-start gap-2 p-2">
      <button
        class="btn-sm btn border-none bg-base-300 normal-case text-slate-800 hover:bg-slate-300 hover:text-slate-900"
        onclick="openModal('main-modal')">Beri
        rating</button>
      <button
        class="btn-sm btn border-none bg-base-300 normal-case text-slate-800 hover:bg-slate-300 hover:text-slate-900"
        onclick="openModal('another-modal')">Beri
        review</button>
    </div>
    {{-- Rating Stat --}}
    <div class="rating-statistic mt-2">
      <h2 class="mt-2 text-lg">Rating</h2>
      <div class="flex max-w-[240px] flex-col">
        <div class="rating items-center gap-2">
          <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
          <span class="text-sm font-semibold">1</span>
          <progress class="w-42 progress progress-warning ml-2" value="{{ $book->ratingStat[1][1] }}"
            max="100"></progress>
          <p class="ml-2 text-sm">{{ $book->ratingStat[1][0] }}</p>
        </div>
        <div class="rating items-center gap-2">
          <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
          <span class="text-sm font-semibold">2</span>
          <progress class="w-42 progress progress-warning ml-2" value="{{ $book->ratingStat[2][1] }}"
            max="100"></progress>
          <p class="ml-2 text-sm">{{ $book->ratingStat[2][0] }}</p>
        </div>
        <div class="rating items-center gap-2">
          <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
          <span class="text-sm font-semibold">3</span>
          <progress class="w-42 progress progress-warning ml-2" value="{{ $book->ratingStat[3][1] }}"
            max="100"></progress>
          <p class="ml-2 text-sm">{{ $book->ratingStat[3][0] }}</p>
        </div>
        <div class="rating items-center gap-2">
          <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
          <span class="text-sm font-semibold">4</span>
          <progress class="w-42 progress progress-warning ml-2" value="{{ $book->ratingStat[4][1] }}"
            max="100"></progress>
          <p class="ml-2 text-sm">{{ $book->ratingStat[4][0] }}</p>
        </div>
        <div class="rating items-center gap-2">
          <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
          <span class="text-sm font-semibold">5</span>
          <progress class="w-42 progress progress-warning ml-2" value="{{ $book->ratingStat[5][1] }}"
            max="100"></progress>
          <p class="ml-2 text-sm">{{ $book->ratingStat[5][0] }}</p>
        </div>
      </div>
    </div>
    {{-- Review --}}
    <div class="review-list mt-2">
      <h2 class="mt-2 text-lg">Review</h2>
      @if ($book->reviews == null)
        <p class="text-slate-500">Belum ada review</p>
      @else
        <ul>
          @foreach ($book->reviews as $review)
            <li class="w-76 card bg-base-100">
              <div class="card-body p-4 pt-2">
                <div id="userRating">
                  <?php $userRating = RatingController::getRatingByUserId($book->id, $review->user_id); ?>
                  @if ($userRating == null)
                  @elseif ($userRating->rating == 1)
                    <div class="rating">
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled
                        checked />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                    </div>
                  @elseif ($userRating->rating == 2)
                    <div class="rating">
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled
                        checked />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                    </div>
                  @elseif ($userRating->rating == 3)
                    <div class="rating">
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled
                        checked />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                    </div>
                  @elseif ($userRating->rating == 4)
                    <div class="rating">
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled
                        checked />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                    </div>
                  @elseif ($userRating->rating == 5)
                    <div class="rating">
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled />
                      <input type="radio" name="rating-4" class="mask mask-star-2 h-4 w-4 bg-yellow-400" disabled
                        checked />
                    </div>
                  @endif
                </div>
                <h2 class="text-xl font-semibold">
                  {{ UserController::getUserById($review->user_id)->first_name . ' ' . UserController::getUserById($review->user_id)->last_name }}
                </h2>
                <p>If a dog chews shoes whose shoes does he choose?</p>
              </div>
            </li>
          @endforeach
        </ul>
        <div class="pages">
          {{ $book->reviews->links() }}
        </div>
      @endif
    </div>
  </div>
  <input type="checkbox" id="my-modal" class="modal-toggle" />
  <div class="modal" id="my-modal">
    <div class="modal-box">
      <h3 class="text-lg font-bold">Congratulations random Internet user!</h3>
      <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for free!</p>
      <div class="modal-action">
        <label for="my-modal" class="btn">Yay!</label>
      </div>
    </div>
  </div>
@endsection

@push('style')
  <style>
    .animated {
      -webkit-animation-duration: 1s;
      animation-duration: 1s;
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;
    }

    .animated.faster {
      -webkit-animation-duration: 500ms;
      animation-duration: 500ms;
    }

    .fadeIn {
      -webkit-animation-name: fadeIn;
      animation-name: fadeIn;
    }

    .fadeOut {
      -webkit-animation-name: fadeOut;
      animation-name: fadeOut;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes fadeOut {
      from {
        opacity: 1;
      }

      to {
        opacity: 0;
      }
    }
  </style>
@endpush

@push('other')
  <div
    class="main-modal animated fadeIn faster fixed inset-0 z-50 flex w-full items-center justify-center overflow-hidden"
    style="background: rgba(0,0,0,.7);">
    <div class="modal-container md:max-w-11/12 z-50 mx-auto w-4/12 overflow-y-auto rounded-lg bg-white">
      <div class="modal-content py-4 px-6 text-left">
        <!--Title-->
        <div class="flex items-center justify-between pb-3">
          <p class="text-2xl font-bold text-slate-600">Beri rating</p>
          <div class="modal-close z-50 cursor-pointer" onclick="modalClose('main-modal')">
            <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
              viewBox="0 0 18 18">
              <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
              </path>
            </svg>
          </div>
        </div>
        <!--Body-->
        <div class="my-5 mr-5 ml-5 flex justify-center">
          <form action="/book/{{ $book->id }}/rating" method="POST" id="add_caretaker_form" class="w-full">
            @csrf
            <div class="rating p-0">
              <input type="radio" id="star-1" name="star-1" class="mask mask-star-2 h-8 w-8 bg-yellow-400" />
              <input type="radio" id="star-2" name="star-2" class="mask mask-star-2 h-8 w-8 bg-yellow-400" />
              <input type="radio" id="star-3" name="star-3" class="mask mask-star-2 h-8 w-8 bg-yellow-400" />
              <input type="radio" id="star-4" name="star-4" class="mask mask-star-2 h-8 w-8 bg-yellow-400" />
              <input type="radio" id="star-5" name="star-5" class="mask mask-star-2 h-8 w-8 bg-yellow-400" />
            </div>
            <div class="flex justify-end space-x-2 pt-2">
              <button class="rounded bg-gray-200 p-3 px-4 font-semibold text-black hover:bg-gray-300"
                onclick="modalClose('main-modal')">Batal</button>
              <input class="ml-3 rounded-lg bg-blue-500 p-3 px-4 text-white hover:bg-teal-400"
                onclick="validate_form(document.getElementById('add_caretaker_form'))" type="submit" value="Simpan" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div
    class="another-modal animated fadeIn faster fixed inset-0 z-50 flex w-full items-center justify-center overflow-hidden"
    style="background: rgba(0,0,0,.7);">
    <div
      class="modal-container md:max-w-11/12 z-50 mx-auto w-4/12 overflow-y-auto rounded-xl border border-blue-500 bg-white shadow-lg shadow-lg">
      <div class="modal-content py-4 px-6 text-left">
        <!--Title-->
        <div class="flex items-center justify-between pb-3">
          <p class="text-2xl font-bold text-gray-500">Edit Caretaker</p>
          <div class="modal-close z-50 cursor-pointer" onclick="modalClose('another-modal')">
            <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
              viewBox="0 0 18 18">
              <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
              </path>
            </svg>
          </div>
        </div>
        <!--Body-->
        <div class="my-5 mr-5 ml-5 flex justify-center">
          <form action="" method="POST" id="add_caretaker_form" class="w-full">
            <div class="">
              <div class="">
                <label for="names" class="text-md text-gray-600">Full Names</label>
              </div>
              <div class="">
                <input type="text" id="names" autocomplete="off" name="names"
                  class="mb-5 h-3 w-full rounded-md border-2 border-gray-300 p-6" placeholder="Example. John Doe">
              </div>
              <div class="">
                <label for="phone" class="text-md text-gray-600">Phone Number</label>
              </div>
              <div class="">
                <input type="text" id="phone" autocomplete="off" name="phone"
                  class="mb-5 h-3 w-full rounded-md border-2 border-gray-300 p-6" placeholder="Example. 0729400426">
              </div>
              <div class="">
                <label for="id_number" class="text-md text-gray-600">ID Number</label>
              </div>
              <div class="">
                <input type="number" id="id_number" autocomplete="off" name="id_number"
                  class="mb-5 h-3 w-full rounded-md border-2 border-gray-300 p-6" placeholder="Caretaker's ID number">
              </div>
            </div>
          </form>
        </div>
        <!--Footer-->
        <div class="flex justify-end space-x-14 pt-2">
          <button class="rounded bg-gray-200 p-3 px-4 font-semibold text-black hover:bg-gray-300"
            onclick="modalClose('another-modal')">Cancel</button>
          <button class="ml-3 rounded-lg bg-blue-500 p-3 px-4 text-white hover:bg-teal-400"
            onclick="validate_form(document.getElementById('add_caretaker_form'))">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    all_modals = ['main-modal', 'another-modal']
    all_modals.forEach((modal) => {
      const modalSelected = document.querySelector('.' + modal);
      modalSelected.classList.remove('fadeIn');
      modalSelected.classList.add('fadeOut');
      modalSelected.style.display = 'none';
    })
    const modalClose = (modal) => {
      const modalToClose = document.querySelector('.' + modal);
      modalToClose.classList.remove('fadeIn');
      modalToClose.classList.add('fadeOut');
      setTimeout(() => {
        modalToClose.style.display = 'none';
      }, 500);
    }

    const openModal = (modal) => {
      const modalToOpen = document.querySelector('.' + modal);
      modalToOpen.classList.remove('fadeOut');
      modalToOpen.classList.add('fadeIn');
      modalToOpen.style.display = 'flex';
    }
  </script>
@endpush
