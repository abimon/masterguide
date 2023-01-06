@extends('layouts.index2',['title'=>'mail'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="full-container">
      <div class="row">
        <div class="col-md-3">
          <div class="h-100 layers">
            <div class="p-20 bgc-grey-100 layer w-100">
              <a href="/compose" class="btn btn-danger btn-block">New Message</a>
            </div>
            <div class="scrollable pos-r bdT layer w-100 fxg-1">
              <ul class="p-20 nav flex-column">
                <li class="nav-item">
                  <a href="javascript:void(0)" class="nav-link c-grey-800 cH-blue-500 actived">
                    <div class="peers ai-c jc-sb">
                      <div class="peer peer-greed">
                        <i class="mR-10 bi bi-envelope"></i>
                        <span>Inbox</span>
                      </div>
                      <div class="peer">
                        <span class="badge badge-pill bgc-deep-purple-50 c-deep-purple-700">+99</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link c-grey-800 cH-blue-500">
                    <div class="peers ai-c jc-sb">
                      <div class="peer peer-greed">
                        <i class="mR-10 bi bi-share"></i>
                        <span>Sent</span>
                      </div>
                      <div class="peer">
                        <span class="badge badge-pill bgc-green-50 c-green-700">12</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link c-grey-800 cH-blue-500">
                    <div class="peers ai-c jc-sb">
                      <div class="peer peer-greed">
                        <i class="mR-10 bi bi-star"></i>
                        <span>Important</span>
                      </div>
                      <div class="peer">
                        <span class="badge badge-pill bgc-blue-50 c-blue-700">3</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link c-grey-800 cH-blue-500">
                    <div class="peers ai-c jc-sb">
                      <div class="peer peer-greed">
                        <i class="mR-10 bi bi-file"></i>
                        <span>Drafts</span>
                      </div>
                      <div class="peer">
                        <span class="badge badge-pill bgc-amber-50 c-amber-700">5</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link c-grey-800 cH-blue-500">
                    <div class="peers ai-c jc-sb">
                      <div class="peer peer-greed">
                        <i class="mR-10 bi bi-exclamation-octagon"></i>
                        <span>Spam</span>
                      </div>
                      <div class="peer">
                        <span class="badge badge-pill bgc-red-50 c-red-700">1</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link c-grey-800 cH-blue-500">
                    <div class="peers ai-c jc-sb">
                      <div class="peer peer-greed">
                        <i class="mR-10 bi bi-trash"></i>
                        <span>Trash</span>
                      </div>
                      <div class="peer">
                        <span class="badge badge-pill bgc-red-50 c-red-700">+99</span>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="layer w-100">
            <div class="bgc-grey-100 peers ai-c jc-sb p-20 fxw-nw">
              <div class="peer">
                <div class="btn-group" role="group">
                  <button type="button" class="email-side-toggle d-n@md+ btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-list"></i>
                  </button>
                  <button type="button" class="btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-folder"></i>
                  </button>
                  <button type="button" class="btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-tag"></i>
                  </button>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn cur-p bgc-white no-after dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu p-2" aria-labelledby="btnGroupDrop1">
                      <li>
                        <a href="" class="mb-2 text-primary">
                          <i class="bi bi-trash mR-10"></i>
                          <span>Delete</span>
                        </a>
                      </li>
                      <li>
                        <a href="" class="mb-2 text-danger">
                          <i class="bi bi-exclamation-octagon mR-10"></i>
                          <span>Mark as Spam</span>
                        </a>
                      </li>
                      <li>
                        <a href="" class="mb-2 text-success">
                          <i class="bi bi-star mR-10"></i>
                          <span>Star</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="peer">
                <div class="btn-group" role="group">
                  <button type="button" class="fsz-xs btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-arrow-left"></i>
                  </button>
                  <button type="button" class="fsz-xs btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-arrow-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="layer w-100">
            <div class="bdT bdB">
              <input type="text" class="form-control m-0 bdw-0 pY-15 pX-20" placeholder="Search...">
            </div>
          </div>
          <div class="layer w-100 fxg-1 scrollable pos-r">
            <div class="">
              <div class="email-list-item peers fxw-nw p-20 bdB bgcH-grey-100 cur-p">
                <div class="peer mR-10">
                  <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                    <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                    <label for="inputCall1" class=" peers peer-greed js-sb ai-c"></label>
                  </div>
                </div>
                <div class="peer peer-greed ov-h">
                  <div class="peers ai-c">
                    <div class="peer peer-greed">
                      <h6>John Doe</h6>
                    </div>
                    <div class="peer">
                      <small>1 min ago</small>
                    </div>
                  </div>
                  <h5 class="fsz-def tt-c c-grey-900">title goes here</h5>
                  <span class="whs-nw w-100 ov-h tov-e d-b">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="h-100 scrollable pos-r">
            <div class="bgc-grey-100 peers ai-c jc-sb p-20 fxw-nw d-n@md+">
              <div class="peer">
                <div class="btn-group" role="group">
                  <button type="button" class="back-to-mailbox btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-arrow-left"></i>
                  </button>
                  <button type="button" class="btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-folder"></i>
                  </button>
                  <button type="button" class="btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-tag"></i>
                  </button>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn cur-p bgc-white no-after dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu fsz-sm" aria-labelledby="btnGroupDrop1">
                      <li>
                        <a href="" class="d-b td-n pY-5 pX-10 bgcH-grey-100 c-grey-700">
                          <i class="bi bi-trash mR-10"></i>
                          <span>Delete</span>
                        </a>
                      </li>
                      <li>
                        <a href="" class="d-b td-n pY-5 pX-10 bgcH-grey-100 c-grey-700">
                          <i class="bi bi-exclamation-octagon mR-10"></i>
                          <span>Mark as Spam</span>
                        </a>
                      </li>
                      <li>
                        <a href="" class="d-b td-n pY-5 pX-10 bgcH-grey-100 c-grey-700">
                          <i class="bi bi-star mR-10"></i>
                          <span>Star</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="peer">
                <div class="btn-group" role="group">
                  <button type="button" class="fsz-xs btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-arrow-left"></i>
                  </button>
                  <button type="button" class="fsz-xs btn bgc-white bdrs-2 mR-3 cur-p">
                    <i class="bi bi-arrow-right"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="email-content-wrapper">
              <!-- Header -->
              <div class="peers ai-c jc-sb pX-40 pY-30">
                <div class="peers peer-greed">
                  <div class="peer mR-20">
                    <img class="bdrs-50p w-3r h-3r" alt="" src="https://randomuser.me/api/portraits/men/11.jpg">
                  </div>
                  <div class="peer">
                    <small>Nov, 02 2017</small>
                    <h5 class="c-grey-900 mB-5">John Doe</h5>
                    <span>To: email@gmail.com</span>
                  </div>
                </div>
                <div class="peer">
                  <a href="" class="btn btn-danger bdrs-50p p-15 lh-0">
                    <i class="bi bi-reply"></i>
                  </a>
                </div>
              </div>

              <!-- Content -->
              <div class="bdT pX-40 pY-30">
                <h4>Title of this email goes here</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                </p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection