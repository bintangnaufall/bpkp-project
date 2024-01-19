@extends('layout.main')

@section('css')

<link href="{{ asset('assets/css/app.min.css') }}" id="app-stylesheet" rel="stylesheet" type="text/css" />

<style>
    .card {
        background-color: #191C24 !important;
    }
    .header-title {
        font-size: 1rem;
        margin: 0 0 7px 0;
    }
    .card-box {
        background-color: #191C24;
        padding: 1.5rem;
        -webkit-box-shadow: 0 0.75rem 6rem rgba(56,65,74,.03);
        box-shadow: 0 0.75rem 6rem rgba(56,65,74,.03);
        margin-bottom: 24px;
        border-radius: 0.25rem;
    }
    .font-weight-normal {
        font-weight: 400!important;
    }
    .pt-2, .py-2 {
        padding-top: 0.75rem!important;
    }

    .mb-1, .my-1 {
        margin-bottom: 0.375rem!important;
    }
</style>
@endsection

@section('content')
<!-- Typography Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Background Colors</h6>
                            <div class="p-2 mb-2 bg-primary text-white">.bg-primary</div>
                            <div class="p-2 mb-2 bg-secondary text-white">.bg-secondary</div>
                            <div class="p-2 mb-2 bg-success text-white">.bg-success</div>
                            <div class="p-2 mb-2 bg-danger text-white">.bg-danger</div>
                            <div class="p-2 mb-2 bg-warning text-dark">.bg-warning</div>
                            <div class="p-2 mb-2 bg-info text-dark">.bg-info</div>
                            <div class="p-2 mb-2 bg-light text-dark">.bg-light</div>
                            <div class="p-2 mb-2 bg-dark text-white">.bg-dark</div>
                            <div class="p-2 mb-2 bg-body text-dark">.bg-body</div>
                            <div class="p-2 mb-2 bg-white text-dark">.bg-white</div>
                            <div class="p-2 mb-0 bg-transparent text-dark">.bg-transparent</div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Text Colors</h6>
                            <p class="text-primary">.text-primary</p>
                            <p class="text-secondary">.text-secondary</p>
                            <p class="text-success">.text-success</p>
                            <p class="text-danger">.text-danger</p>
                            <p class="text-warning bg-dark">.text-warning</p>
                            <p class="text-info bg-dark">.text-info</p>
                            <p class="text-light bg-dark">.text-light</p>
                            <p class="text-dark">.text-dark</p>
                            <p class="text-body">.text-body</p>
                            <p class="text-muted">.text-muted</p>
                            <p class="text-white bg-dark">.text-white</p>
                            <p class="text-black-50">.text-black-50</p>
                            <p class="text-white-50 bg-dark mb-0">.text-white-50</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Headings</h6>
                            <h1>h1 Heading</h1>
                            <h2>h2 Heading</h2>
                            <h3>h3 Heading</h3>
                            <h4>h4 Heading</h4>
                            <h5>h5 Heading</h5>
                            <h6>h6 Heading</h6>
                            <p class="h1">.h1 Heading</p>
                            <p class="h2">.h2 Heading</p>
                            <p class="h3">.h3 Heading</p>
                            <p class="h4">.h4 Heading</p>
                            <p class="h5">.h5 Heading</p>
                            <p class="h6">.h6 Heading</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Display Headings</h6>
                            <h1 class="display-1">Display 1</h1>
                            <h1 class="display-2">Display 2</h1>
                            <h1 class="display-3">Display 3</h1>
                            <h1 class="display-4">Display 4</h1>
                            <h1 class="display-5">Display 5</h1>
                            <h1 class="display-6 mb-0">Display 6</h1>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Text Elements</h6>
                            <p>This is a standard paragraph</p>
                            <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                            <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                            <p><del>This line of text is meant to be treated as deleted text.</del></p>
                            <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
                            <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
                            <p><u>This line of text will render as underlined.</u></p>
                            <p><small>This line of text is meant to be treated as fine print.</small></p>
                            <p><strong>This line rendered as bold text.</strong></p>
                            <p class="mb-0"><em>This line rendered as italicized text.</em></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Blockquotes</h6>
                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure>
                                    <blockquote class="blockquote">
                                        <p>A well-known quote, contained in a blockquote element.</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="border rounded p-4 pb-0 mb-4">
                                <figure class="text-center">
                                    <blockquote class="blockquote">
                                        <p>A well-known quote, contained in a blockquote element.</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="border rounded p-4 pb-0 mb-0">
                                <figure class="text-end">
                                    <blockquote class="blockquote">
                                        <p>A well-known quote, contained in a blockquote element.</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Unstyled List</h6>
                            <ul class="list-unstyled mb-0">
                                <li>This is a list.</li>
                                <li>It appears completely unstyled.</li>
                                <li>Structurally, it's still a list.</li>
                                <li>However, this style only applies to immediate child elements.</li>
                                <li>Nested lists:
                                    <ul>
                                        <li>are unaffected by this style</li>
                                        <li>will still show a bullet</li>
                                        <li>and have appropriate left margin</li>
                                    </ul>
                                </li>
                                <li>This may still come in handy in some situations.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Description List</h6>
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Description lists</dt>
                                <dd class="col-sm-8">A description list is perfect for defining terms.</dd>

                                <dt class="col-sm-4">Term</dt>
                                <dd class="col-sm-8">Definition for the term.</dd>

                                <dt class="col-sm-4">Another term</dt>
                                <dd class="col-sm-8">This definition is short, so no extra paragraphs or anything.</dd>

                                <dt class="col-sm-4 text-truncate">Truncated term is truncated</dt>
                                <dd class="col-sm-8">This can be useful when space is tight. Adds an ellipsis at the
                                    end.</dd>

                                <dt class="col-sm-4">Nesting</dt>
                                <dd class="col-sm-8">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nested list</dt>
                                        <dd class="col-sm-8">Nested definition list.</dd>
                                    </dl>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Basic List Group</h6>
                            <ul class="list-group">
                                <li class="list-group-item bg-transparent">An item</li>
                                <li class="list-group-item bg-transparent">A second item</li>
                                <li class="list-group-item bg-transparent">A third item</li>
                                <li class="list-group-item bg-transparent">A fourth item</li>
                                <li class="list-group-item bg-transparent">And a fifth one</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Flush List Group</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent">An item</li>
                                <li class="list-group-item bg-transparent">A second item</li>
                                <li class="list-group-item bg-transparent">A third item</li>
                                <li class="list-group-item bg-transparent">A fourth item</li>
                                <li class="list-group-item bg-transparent">And a fifth one</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Typography End -->

            <!-- Button Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Basic Buttons</h6>
                            <div class="m-n2">
                                <button type="button" class="btn btn-primary m-2">Primary</button>
                                <button type="button" class="btn btn-secondary m-2">Secondary</button>
                                <button type="button" class="btn btn-success m-2">Success</button>
                                <button type="button" class="btn btn-danger m-2">Danger</button>
                                <button type="button" class="btn btn-warning m-2">Warning</button>
                                <button type="button" class="btn btn-info m-2">Info</button>
                                <button type="button" class="btn btn-light m-2">Light</button>
                                <button type="button" class="btn btn-dark m-2">Dark</button>
                                <button type="button" class="btn btn-link m-2">Link</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Outline Buttons</h6>
                            <div class="m-n2">
                                <button type="button" class="btn btn-outline-primary m-2">Primary</button>
                                <button type="button" class="btn btn-outline-secondary m-2">Secondary</button>
                                <button type="button" class="btn btn-outline-success m-2">Success</button>
                                <button type="button" class="btn btn-outline-danger m-2">Danger</button>
                                <button type="button" class="btn btn-outline-warning m-2">Warning</button>
                                <button type="button" class="btn btn-outline-info m-2">Info</button>
                                <button type="button" class="btn btn-outline-light m-2">Light</button>
                                <button type="button" class="btn btn-outline-dark m-2">Dark</button>
                                <button type="button" class="btn btn-outline-link m-2">Link</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Rounded Buttons</h6>
                            <div class="m-n2">
                                <button type="button" class="btn btn-primary rounded-pill m-2">Primary</button>
                                <button type="button" class="btn btn-secondary rounded-pill m-2">Secondary</button>
                                <button type="button" class="btn btn-success rounded-pill m-2">Success</button>
                                <button type="button" class="btn btn-danger rounded-pill m-2">Danger</button>
                                <button type="button" class="btn btn-warning rounded-pill m-2">Warning</button>
                                <button type="button" class="btn btn-info rounded-pill m-2">Info</button>
                                <button type="button" class="btn btn-light rounded-pill m-2">Light</button>
                                <button type="button" class="btn btn-dark rounded-pill m-2">Dark</button>
                                <button type="button" class="btn btn-link rounded-pill m-2">Link</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Buttons Size</h6>
                            <div class="m-n2">
                                <button type="button" class="btn btn-lg btn-primary m-2">Large Button (btn-lg)</button>
                                <button type="button" class="btn btn-lg btn-secondary m-2">Large Button (btn-lg)</button>
                                <button type="button" class="btn btn-sm btn-primary m-2">Small Button (btn-sm)</button>
                                <button type="button" class="btn btn-sm btn-secondary m-2">Small Button (btn-sm)</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Icon Buttons</h6>
                            <div class="m-n2">
                                <button type="button" class="btn btn-square btn-primary m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-outline-primary m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-secondary m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-outline-secondary m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-success m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-outline-success m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-danger m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-outline-danger m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-warning m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-outline-warning m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-info m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-outline-info m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-dark m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-outline-dark m-2"><i class="fa fa-home"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Icon Buttons Size</h6>
                            <div class="m-n2">
                                <button type="button" class="btn btn-lg btn-lg-square btn-primary m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-lg btn-lg-square btn-outline-primary m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-primary m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-square btn-outline-primary m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-sm btn-sm-square btn-outline-primary m-2"><i class="fa fa-home"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Icon & Text Buttons</h6>
                            <div class="m-n2">
                                <button type="button" class="btn btn-primary m-2"><i class="fa fa-home me-2"></i>Icon Left</button>
                                <button type="button" class="btn btn-outline-primary m-2"><i class="fa fa-home me-2"></i>Icon Left</button>
                                <button type="button" class="btn btn-primary m-2">Icon Right<i class="fa fa-home ms-2"></i></button>
                                <button type="button" class="btn btn-outline-primary m-2">Icon Right<i class="fa fa-home ms-2"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Block Buttons</h6>
                            <div class="m-n2">
                                <button class="btn btn-primary w-100 m-2" type="button">Button</button>
                                <button class="btn btn-outline-primary w-100 m-2" type="button">Button</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Basic Button Group</h6>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary">Left</button>
                                <button type="button" class="btn btn-primary">Middle</button>
                                <button type="button" class="btn btn-primary">Right</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Mixed Button Group</h6>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-danger">Left</button>
                                <button type="button" class="btn btn-warning">Middle</button>
                                <button type="button" class="btn btn-success">Right</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Outlined Button Group</h6>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-primary">Left</button>
                                <button type="button" class="btn btn-outline-primary">Middle</button>
                                <button type="button" class="btn btn-outline-primary">Right</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Checkbox Button Group</h6>
                            <div class="btn-group" role="group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Radio Button Group</h6>
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                                    checked>
                                <label class="btn btn-outline-primary" for="btnradio1">Radio 1</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2">Radio 2</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio3">Radio 3</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Button Toolbar</h6>
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-primary">1</button>
                                    <button type="button" class="btn btn-primary">2</button>
                                    <button type="button" class="btn btn-primary">3</button>
                                    <button type="button" class="btn btn-primary">4</button>
                                </div>
                                <div class="btn-group me-2" role="group" aria-label="Second group">
                                    <button type="button" class="btn btn-secondary">5</button>
                                    <button type="button" class="btn btn-secondary">6</button>
                                    <button type="button" class="btn btn-secondary">7</button>
                                </div>
                                <div class="btn-group" role="group" aria-label="Third group">
                                    <button type="button" class="btn btn-info">8</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Vertical Button Group</h6>
                            <div class="btn-group-vertical me-2" role="group">
                                <button type="button" class="btn btn-primary">Left</button>
                                <button type="button" class="btn btn-primary">Middle</button>
                                <button type="button" class="btn btn-primary">Right</button>
                            </div>
                            <div class="btn-group-vertical" role="group">
                                <button type="button" class="btn btn-danger">Left</button>
                                <button type="button" class="btn btn-warning">Middle</button>
                                <button type="button" class="btn btn-success">Right</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Vertical Button Group (Checkbox & Radio)</h6>
                            <div class="btn-group-vertical me-2" role="group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>
                            </div>
                            <div class="btn-group-vertical" role="group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                                    checked>
                                <label class="btn btn-outline-primary" for="btnradio1">Radio 1</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2">Radio 2</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio3">Radio 3</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Button End -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- Kalender -->
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary shadow-lg rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>


                    <!-- List -->
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-white shadow-lg rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-transparent" type="text" placeholder="Enter task">
                                <button type="button" class="btn btn-primary ms-2">Add</button>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox" checked>
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span><del>Short task goes here...</del></span>
                                        <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Table Awal -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Basic Table</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>jhon@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>mark@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>jacob@email.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Accented Table</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>jhon@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>mark@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>jacob@email.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Hoverable Table</h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>jhon@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>mark@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>jacob@email.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Color Table</h6>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>jhon@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>mark@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>jacob@email.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Bordered Table</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>jhon@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>mark@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>jacob@email.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Table Without Border</h6>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>jhon@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>mark@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>jacob@email.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-white shadow-lg rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">ZIP</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>jhon@email.com</td>
                                            <td>USA</td>
                                            <td>123</td>
                                            <td>Member</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>mark@email.com</td>
                                            <td>UK</td>
                                            <td>456</td>
                                            <td>Member</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>jacob@email.com</td>
                                            <td>AU</td>
                                            <td>789</td>
                                            <td>Member</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Akhir -->

           
@endsection



@section('js')
 <!-- Vendor js -->
 <script src="{{ asset('assets/js/vendor.min.js')}}"></script>

 <!-- knob plugin -->
 <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

 <!--Morris Chart-->
 <script src="{{ asset('assets/libs/morris-js/morris.min.js')}}"></script>
 <script src="{{ asset('assets/libs/raphael/raphael.min.js')}}"></script>

 <!-- Dashboard init js-->
 <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>

 <!-- App js -->
<script src="{{ asset('assets/js/app.min.js')}}"></script>
@endsection

