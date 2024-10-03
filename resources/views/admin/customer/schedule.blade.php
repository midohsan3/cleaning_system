@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Cleaner Schedule
@endsection
{{-- 
  ====================
  ====================
  --}}
@section('page-content')
<div class="nk-content ">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Cleaner / Name</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addEventPopup"><em
                  class="icon ni ni-plus"></em><span>Add Booking</span></a>
            </div><!-- .nk-block-head-content -->
          </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
          <div class="card card-bordered">
            <div class="card-inner">
              <div id="calendar" class="nk-calendar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


{{-- ==========================
        ===== MODALS
        ========================== --}}
{{-- ==========================
                =====ACTIVATE MODAL
                ========================== --}}
@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
New Staff
@endsection
{{-- 
  ====================
  ====================
  --}}
@section('page-content')
<div class="nk-content ">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head">
          <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Cleaner ?
                <strong class="text-primary small">Name</strong>
              </h3>

              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Created At: <span class="text-base">{{ date('d M Y h:i A',strtotime(now())) }}</span></li>
                </ul>
              </div>
            </div>

            <div class="nk-block-head-content">
              <a href="{{ route('admin.employee.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>Back</span>
              </a>

              <a href="{{ route('admin.employee.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                <em class="icon ni ni-arrow-left"></em>
              </a>
            </div>
          </div>
        </div>

        <div class="nk-block-head-content">
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addEventPopup"><em
              class="icon ni ni-plus"></em><span>Add
              Booking</span></a>
        </div>


        <div class="nk-block">
          <div class="card card-bordered">
            <div class="card-inner">
              <div id="calendar" class="nk-calendar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- ==========================
        ===== MODALS
        ========================== --}}
{{-- ==========================
                =====ACTIVATE MODAL
                ========================== --}}
<div class="modal fade" tabindex="-1" id="addEventPopup">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Events</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
      </div>
      <div class="modal-body">
        <form action="#" id="addEventForm" class="form-validate is-alter">
          <div class="row gx-4 gy-3">
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="event-title">Event Title</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" id="event-title" required>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-label">Start Date & Time</label>
                <div class="row gx-2">
                  <div class="w-55">
                    <div class="form-control-wrap">
                      <div class="form-icon form-icon-left">
                        <em class="icon ni ni-calendar"></em>
                      </div>
                      <input type="text" id="event-start-date" class="form-control date-picker"
                        data-date-format="yyyy-mm-dd" required>
                    </div>
                  </div>
                  <div class="w-45">
                    <div class="form-control-wrap">
                      <div class="form-icon form-icon-left">
                        <em class="icon ni ni-clock"></em>
                      </div>
                      <input type="text" id="event-start-time" data-time-format="HH:mm:ss"
                        class="form-control time-picker">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="form-label">End Date & Time</label>
                <div class="row gx-2">
                  <div class="w-55">
                    <div class="form-control-wrap">
                      <div class="form-icon form-icon-left">
                        <em class="icon ni ni-calendar"></em>
                      </div>
                      <input type="text" id="event-end-date" class="form-control date-picker"
                        data-date-format="yyyy-mm-dd">
                    </div>
                  </div>
                  <div class="w-45">
                    <div class="form-control-wrap">
                      <div class="form-icon form-icon-left">
                        <em class="icon ni ni-clock"></em>
                      </div>
                      <input type="text" id="event-end-time" data-time-format="HH:mm:ss"
                        class="form-control time-picker">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="event-description">Event Description</label>
                <div class="form-control-wrap">
                  <textarea class="form-control" id="event-description"></textarea>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Event Category</label>
                <div class="form-control-wrap">
                  <select id="event-theme" class="select-calendar-theme form-control form-control-lg">
                    <option value="event-primary">Company</option>
                    <option value="event-success">Seminars </option>
                    <option value="event-info">Conferences</option>
                    <option value="event-warning">Meeting</option>
                    <option value="event-danger">Business dinners</option>
                    <option value="event-pink">Private</option>
                    <option value="event-primary-dim">Auctions</option>
                    <option value="event-success-dim">Networking events</option>
                    <option value="event-info-dim">Product launches</option>
                    <option value="event-warning-dim">Fundrising</option>
                    <option value="event-danger-dim">Sponsored</option>
                    <option value="event-pink-dim">Sports events</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- <div class="col-12">
                                      <div class="form-group">
                                          <label class="form-label" for="default-textarea">Event Theme</label>
                                          <ul class="fc-event-theme">
                                              <li>
                                                  <input type="radio" id="event-primary" value="event-primary" name="eventTheme">
                                                  <label class="fc-event-primary" for="event-primary">Primary</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-success" value="event-success" name="eventTheme">
                                                  <label class="fc-event-success" for="event-success">Success</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-info" value="event-info" name="eventTheme">
                                                  <label class="fc-event-info" for="event-info">Info</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-warning" value="event-warning" name="eventTheme">
                                                  <label class="fc-event-warning" for="event-warning">Warning</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-danger" value="event-danger" name="eventTheme">
                                                  <label class="fc-event-danger" for="event-danger">Danger</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-secondary" value="event-secondary" name="eventTheme">
                                                  <label class="fc-event-secondary" for="event-secondary">Secondary</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-dark" value="event-dark" name="eventTheme">
                                                  <label class="fc-event-dark" for="event-dark">Dark</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-blue" value="event-blue" name="eventTheme">
                                                  <label class="fc-event-blue" for="event-blue">Blue</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-azure" value="event-azure" name="eventTheme">
                                                  <label class="fc-event-azure" for="event-azure">Azure</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-indigo" value="event-indigo" name="eventTheme">
                                                  <label class="fc-event-indigo" for="event-indigo">Indigo</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-purple" value="event-purple" name="eventTheme">
                                                  <label class="fc-event-purple" for="event-purple">Purple</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-pink" value="event-pink" name="eventTheme">
                                                  <label class="fc-event-pink" for="event-pink">Pink</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-orange" value="event-orange" name="eventTheme">
                                                  <label class="fc-event-orange" for="event-orange">Orange</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-teal" value="event-teal" name="eventTheme">
                                                  <label class="fc-event-teal" for="event-teal">Teal</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-primary-dim" value="event-primary-dim" name="eventTheme">
                                                  <label class="fc-event-primary-dim" for="event-primary-dim">Primary</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-success-dim" value="event-success-dim" name="eventTheme">
                                                  <label class="fc-event-success-dim" for="event-success-dim">Success</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-info-dim" value="event-info-dim" name="eventTheme">
                                                  <label class="fc-event-info-dim" for="event-info-dim">Info</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-warning-dim" value="event-warning-dim" name="eventTheme">
                                                  <label class="fc-event-warning-dim" for="event-warning-dim">Warning</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-danger-dim" value="event-danger-dim" name="eventTheme">
                                                  <label class="fc-event-danger-dim" for="event-danger-dim">Danger</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-secondary-dim" value="event-secondary-dim" name="eventTheme">
                                                  <label class="fc-event-secondary-dim" for="event-secondary-dim">Secondary</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-dark-dim" value="event-dark-dim" name="eventTheme">
                                                  <label class="fc-event-dark-dim" for="event-dark-dim">Dark</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-blue-dim" value="event-blue-dim" name="eventTheme">
                                                  <label class="fc-event-blue-dim" for="event-blue-dim">Blue</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-azure-dim" value="event-azure-dim" name="eventTheme">
                                                  <label class="fc-event-azure-dim" for="event-azure-dim">Azure</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-indigo-dim" value="event-indigo-dim" name="eventTheme">
                                                  <label class="fc-event-indigo-dim" for="event-indigo-dim">Indigo</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-purple-dim" value="event-purple-dim" name="eventTheme">
                                                  <label class="fc-event-purple-dim" for="event-purple-dim">Purple</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-pink-dim" value="event-pink-dim" name="eventTheme">
                                                  <label class="fc-event-pink-dim" for="event-pink-dim">Pink</label>
                                              </li>
                                              <li>
                                                  <input type="radio" id="event-orange-dim" value="event-orange-dim" name="eventTheme">
                                                  <label class="fc-event-orange-dim" for="event-orange-dim">Orange</label>
                                              </li>
                                              <li> 
                                                  <input type="radio" id="event-teal-dim" value="event-teal-dim" name="eventTheme">
                                                  <label class="fc-event-teal-dim" for="event-teal-dim">Teal</label>
                                              </li>
                                          </ul>
                                      </div>
                                  </div> -->
            <div class="col-12">
              <ul class="d-flex justify-content-between gx-4 mt-1">
                <li>
                  <button id="addEvent" type="submit" class="btn btn-primary">Add Event</button>
                </li>
                <li>
                  <button id="resetEvent" data-dismiss="modal" class="btn btn-danger btn-dim">Discard</button>
                </li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" id="editEventPopup">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Event</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
      </div>
      <div class="modal-body">
        <form action="#" id="editEventForm" class="form-validate is-alter">
          <div class="row gx-4 gy-3">
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="edit-event-title">Event Title</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" id="edit-event-title" required>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="form-label">Start Date & Time</label>
                <div class="row gx-2">
                  <div class="w-55">
                    <div class="form-control-wrap">
                      <div class="form-icon form-icon-left">
                        <em class="icon ni ni-calendar"></em>
                      </div>
                      <input type="text" id="edit-event-start-date" class="form-control date-picker"
                        data-date-format="yyyy-mm-dd" required>
                    </div>
                  </div>
                  <div class="w-45">
                    <div class="form-control-wrap">
                      <div class="form-icon form-icon-left">
                        <em class="icon ni ni-clock"></em>
                      </div>
                      <input type="text" id="edit-event-start-time" data-time-format="HH:mm:ss"
                        class="form-control time-picker">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="form-label">End Date & Time</label>
                <div class="row gx-2">
                  <div class="w-55">
                    <div class="form-control-wrap">
                      <div class="form-icon form-icon-left">
                        <em class="icon ni ni-calendar"></em>
                      </div>
                      <input type="text" id="edit-event-end-date" class="form-control date-picker"
                        data-date-format="yyyy-mm-dd">
                    </div>
                  </div>
                  <div class="w-45">
                    <div class="form-control-wrap">
                      <div class="form-icon form-icon-left">
                        <em class="icon ni ni-clock"></em>
                      </div>
                      <input type="text" id="edit-event-end-time" data-time-format="HH:mm:ss"
                        class="form-control time-picker">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="edit-event-description">Event Description</label>
                <div class="form-control-wrap">
                  <textarea class="form-control" id="edit-event-description"></textarea>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Event Category</label>
                <div class="form-control-wrap">
                  <select id="edit-event-theme" class="select-calendar-theme form-control form-control-lg">
                    <option value="event-primary">Company</option>
                    <option value="event-success">Seminars </option>
                    <option value="event-info">Conferences</option>
                    <option value="event-warning">Meeting</option>
                    <option value="event-danger">Business dinners</option>
                    <option value="event-pink">Private</option>
                    <option value="event-primary-dim">Auctions</option>
                    <option value="event-success-dim">Networking events</option>
                    <option value="event-info-dim">Product launches</option>
                    <option value="event-warning-dim">Fundrising</option>
                    <option value="event-danger-dim">Sponsored</option>
                    <option value="event-pink-dim">Sports events</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12">
              <ul class="d-flex justify-content-between gx-4 mt-1">
                <li>
                  <button id="updateEvent" type="submit" class="btn btn-primary">Update
                    Event</button>
                </li>
                <li>
                  <button data-dismiss="modal" data-toggle="modal" data-target="#deleteEventPopup"
                    class="btn btn-danger btn-dim">Delete</button>
                </li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" id="previewEventPopup">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div id="preview-event-header" class="modal-header">
        <h5 id="preview-event-title" class="modal-title"></h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
      </div>
      <div class="modal-body">
        <div class="row gy-3 py-1">
          <div class="col-sm-6">
            <h6 class="overline-title">Start Time</h6>
            <p id="preview-event-start"></p>
          </div>
          <div class="col-sm-6" id="preview-event-end-check">
            <h6 class="overline-title">End Time</h6>
            <p id="preview-event-end"></p>
          </div>
          <div class="col-sm-10" id="preview-event-description-check">
            <h6 class="overline-title">Description</h6>
            <p id="preview-event-description"></p>
          </div>
        </div>
        <ul class="d-flex justify-content-between gx-4 mt-3">
          <li>
            <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup" class="btn btn-primary">Edit
              Event</button>
          </li>
          <li>
            <button data-dismiss="modal" data-toggle="modal" data-target="#deleteEventPopup"
              class="btn btn-danger btn-dim">Delete</button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" id="deleteEventPopup">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body modal-body-lg text-center">
        <div class="nk-modal py-4">
          <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
          <h4 class="nk-modal-title">Are You Sure ?</h4>
          <div class="nk-modal-text mt-n2">
            <p class="text-soft">This event data will be removed permanently.</p>
          </div>
          <ul class="d-flex justify-content-center gx-4 mt-4">
            <li>
              <button data-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes, Delete
                it</button>
            </li>
            <li>
              <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup"
                class="btn btn-danger btn-dim">Cancel</button>
            </li>
          </ul>
        </div>
      </div><!-- .modal-body -->
    </div>
  </div>
</div>
@endsection
{{-- 
    ====================
    ====================
    --}}
@endsection
{{-- 
    ====================
    ====================
    --}}
@section('page-scripts')
<script src="{{ asset('admin/js/libs/fullcalendar.js?ver=2.4.0') }}"></script>
<script>
  "use strict";

!function (NioApp, $) {
  "use strict"; // Variable

  var $win = $(window),
      $body = $('body'),
      breaks = NioApp.Break;

  NioApp.Calendar = function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    var tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);
    var t_dd = String(tomorrow.getDate()).padStart(2, '0');
    var t_mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
    var t_yyyy = tomorrow.getFullYear();
    var yesterday = new Date(today);
    yesterday.setDate(today.getDate() - 1);
    var y_dd = String(yesterday.getDate()).padStart(2, '0');
    var y_mm = String(yesterday.getMonth() + 1).padStart(2, '0');
    var y_yyyy = yesterday.getFullYear();
    var YM = yyyy + '-' + mm;
    var YESTERDAY = y_yyyy + '-' + y_mm + '-' + y_dd;
    var TODAY = yyyy + '-' + mm + '-' + dd;
    var TOMORROW = t_yyyy + '-' + t_mm + '-' + t_dd;
    var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var calendarEl = document.getElementById('calendar');
    var eventsEl = document.getElementById('externalEvents');
    var removeEvent = document.getElementById('removeEvent');
    var addEventBtn = $('#addEvent');
    var addEventForm = $('#addEventForm');
    var addEventPopup = $('#addEventPopup');
    var updateEventBtn = $('#updateEvent');
    var editEventForm = $('#editEventForm');
    var editEventPopup = $('#editEventPopup');
    var previewEventPopup = $('#previewEventPopup');
    var deleteEventBtn = $('#deleteEvent');
    var mobileView = NioApp.Win.width < NioApp.Break.md ? true : false;
    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'UTC',
      initialView: mobileView ? 'listWeek' : 'dayGridMonth',
      themeSystem: 'bootstrap',
      headerToolbar: {
        left: 'title prev,next',
        center: null,
        right: 'today dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      height: 800,
      contentHeight: 780,
      aspectRatio: 3,
      editable: true,
      droppable: true,
      views: {
        dayGridMonth: {
          dayMaxEventRows: 2
        }
      },
      direction: NioApp.State.isRTL ? "rtl" : "ltr",
      nowIndicator: true,
      now: TODAY + 'T09:25:00',
      eventDragStart: function eventDragStart(info) {
        $('.popover').popover('hide');
      },
      eventMouseEnter: function eventMouseEnter(info) {
        $(info.el).popover({
          template: '<div class="popover"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
          title: info.event._def.title,
          content: info.event._def.extendedProps.description,
          placement: 'top'
        });
        info.event._def.extendedProps.description ? $(info.el).popover('show') : $(info.el).popover('hide');
      },
      eventMouseLeave: function eventMouseLeave(info) {
        $(info.el).popover('hide');
      },
      eventClick: function eventClick(info) {
        // Get data
        var title = info.event._def.title;
        var description = info.event._def.extendedProps.description;
        var start = info.event._instance.range.start;
        var startDate = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2, '0') + '-' + String(start.getDate()).padStart(2, '0');
        var startTime = start.toUTCString().split(' ');
        startTime = startTime[startTime.length - 2];
        startTime = startTime == '00:00:00' ? '' : startTime;
        var end = info.event._instance.range.end;
        var endDate = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2, '0') + '-' + String(end.getDate()).padStart(2, '0');
        var endTime = end.toUTCString().split(' ');
        endTime = endTime[endTime.length - 2];
        endTime = endTime == '00:00:00' ? '' : endTime;

        var className = info.event._def.ui.classNames[0].slice(3);

        var eventId = info.event._def.publicId; //Set data in eidt form

        $('#edit-event-title').val(title);
        $('#edit-event-start-date').val(startDate).datepicker('update');
        $('#edit-event-end-date').val(endDate).datepicker('update');
        $('#edit-event-start-time').val(startTime);
        $('#edit-event-end-time').val(endTime);
        $('#edit-event-description').val(description);
        $('#edit-event-theme').val(className);
        $('#edit-event-theme').trigger('change.select2');
        editEventForm.attr('data-id', eventId); // Set data in preview

        var previewStart = String(start.getDate()).padStart(2, '0') + ' ' + month[start.getMonth()] + ' ' + start.getFullYear() + (startTime ? ' - ' + to12(startTime) : '');
        var previewEnd = String(end.getDate()).padStart(2, '0') + ' ' + month[end.getMonth()] + ' ' + end.getFullYear() + (endTime ? ' - ' + to12(endTime) : '');
        $('#preview-event-title').text(title);
        $('#preview-event-header').addClass('fc-' + className);
        $('#preview-event-start').text(previewStart);
        $('#preview-event-end').text(previewEnd);
        $('#preview-event-description').text(description);
        !description ? $('#preview-event-description-check').css('display', 'none') : null;
        previewEventPopup.modal('show');
        $('.popover').popover('hide');
      },
      events: [{
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Reader will be distracted',
        start: YM + '-03T13:30:00',
        className: "fc-event-danger",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Rabfov va hezow.',
        start: YM + '-14T13:30:00',
        end: YM + '-14',
        className: "fc-event-success",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'The leap into electronic',
        start: YM + '-05',
        end: YM + '-06',
        className: "fc-event-primary",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Lorem Ipsum passage - Product Release',
        start: YM + '-02',
        end: YM + '-04',
        className: "fc-event-primary",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        title: 'Gibmuza viib hepobe.',
        start: YM + '-12',
        end: YM + '-10',
        className: "fc-event-pink-dim",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Jidehse gegoj fupelone.',
        start: YM + '-07T16:00:00',
        className: "fc-event-danger-dim",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Ke uzipiz zip.',
        start: YM + '-16T16:00:00',
        end: YM + '-14',
        className: "fc-event-info-dim",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Piece of classical Latin literature',
        start: TODAY,
        end: TODAY + '-01',
        className: "fc-event-primary",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Nogok kewwib ezidbi.',
        start: TODAY + 'T10:00:00',
        className: "fc-event-info",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Mifebi ik cumean.',
        start: TODAY + 'T14:30:00',
        className: "fc-event-warning-dim",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Play Time',
        start: TODAY + 'T17:30:00',
        className: "fc-event-info",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'Rujfogve kabwih haznojuf.',
        start: YESTERDAY + 'T05:00:00',
        className: "fc-event-danger",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }, {
        id: 'default-event-id-' + Math.floor(Math.random() * 9999999),
        title: 'simply dummy text of the printing',
        start: YESTERDAY + 'T07:00:00',
        className: "fc-event-primary-dim",
        description: "Use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden."
      }]
    });
    calendar.render(); //Add event

    addEventBtn.on("click", function (e) {
      e.preventDefault();
      var eventTitle = $('#event-title').val();
      var eventStartDate = $('#event-start-date').val();
      var eventEndDate = $('#event-end-date').val();
      var eventStartTime = $('#event-start-time').val();
      var eventEndTime = $('#event-end-time').val();
      var eventDescription = $('#event-description').val();
      var eventTheme = $('#event-theme').val();
      var eventStartTimeCheck = eventStartTime ? 'T' + eventStartTime + 'Z' : '';
      var eventEndTimeCheck = eventEndTime ? 'T' + eventEndTime + 'Z' : '';
      console.log(eventStartTime);
      calendar.addEvent({
        id: 'added-event-id-' + Math.floor(Math.random() * 9999999),
        title: eventTitle,
        start: eventStartDate + eventStartTimeCheck,
        end: eventEndDate + eventEndTimeCheck,
        className: "fc-" + eventTheme,
        description: eventDescription
      });
      addEventPopup.modal('hide');
    });
    updateEventBtn.on("click", function (e) {
      e.preventDefault();
      var eventTitle = $('#edit-event-title').val();
      var eventStartDate = $('#edit-event-start-date').val();
      var eventEndDate = $('#edit-event-end-date').val();
      var eventStartTime = $('#edit-event-start-time').val();
      var eventEndTime = $('#edit-event-end-time').val();
      var eventDescription = $('#edit-event-description').val();
      var eventTheme = $('#edit-event-theme').val();
      var eventStartTimeCheck = eventStartTime ? 'T' + eventStartTime + 'Z' : '';
      var eventEndTimeCheck = eventEndTime ? 'T' + eventEndTime + 'Z' : '';
      var selectEvent = calendar.getEventById(editEventForm[0].dataset.id);
      selectEvent.remove();
      calendar.addEvent({
        id: editEventForm[0].dataset.id,
        title: eventTitle,
        start: eventStartDate + eventStartTimeCheck,
        end: eventEndDate + eventEndTimeCheck,
        className: "fc-" + eventTheme,
        description: eventDescription
      });
      editEventPopup.modal('hide');
    });
    deleteEventBtn.on("click", function (e) {
      e.preventDefault();
      var selectEvent = calendar.getEventById(editEventForm[0].dataset.id);
      selectEvent.remove();
    });

    function to12(time) {
      time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

      if (time.length > 1) {
        time = time.slice(1);
        time.pop();
        time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM

        time[0] = +time[0] % 12 || 12;
      }

      time = time.join('');
      return time;
    }

    function customCalSelect(cat) {
      if (!cat.id) {
        return cat.text;
      }

      var $cat = $('<span class="fc-' + cat.element.value + '"> <span class="dot"></span>' + cat.text + '</span>');
      return $cat;
    }

    ;
    $(".select-calendar-theme").select2({
      templateResult: customCalSelect
    });
    addEventPopup.on('hidden.bs.modal', function (e) {
      setTimeout(function () {
        $('#addEventForm input,#addEventForm textarea').val('');
        $('#event-theme').val('event-primary');
        $('#event-theme').trigger('change.select2');
      }, 1000);
    });
    previewEventPopup.on('hidden.bs.modal', function (e) {
      $('#preview-event-header').removeClass().addClass('modal-header');
    });
  };

  NioApp.coms.docReady.push(NioApp.Calendar);
}(NioApp, jQuery);
</script>
@endsection
{{-- 
    ====================
    ====================
    --}}