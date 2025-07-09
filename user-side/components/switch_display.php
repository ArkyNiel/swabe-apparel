<div style="position: absolute; top: 120px; left: 30px; z-index: 1050;">
  <label class="form-check form-switch custom-switch-lg" style="cursor:pointer;">
    <input class="form-check-input custom-switch-input-lg" type="checkbox" role="switch" id="displaySwitch">
  </label>
</div>

<style>
.custom-switch-lg .form-check-input {
    width: 4rem;
    height: 2rem;
    border-radius: 2rem;
    background-color: #e9ecef;
    border: 2px solid #adb5bd;
    transition: background-color 0.2s, border-color 0.2s;

}

.custom-switch-lg .form-check-input:checked {
    background-color: #ffc107;
    border-color: #ffc107;
}

.custom-switch-lg .form-check-input:focus {
    box-shadow: 0 0 0 0.2rem rgba(255,193,7,.25);
}

.custom-switch-lg .form-check-input:before {
    content: "";
    position: absolute;
    left: 0.25rem;
    top: 0.25rem;
    width: 1.5rem;
    height: 1.5rem;
    border-radius: 50%;
    background: #fff;
    transition: transform 0.2s;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.custom-switch-lg .form-check-input:checked:before {
    transform: translateX(2rem);
}

.custom-switch-lg {
    position: relative;
    display: inline-block;
    padding-left: 0;
}
.custom-switch-lg .form-check-input {
    position: relative;
    margin-left: 0;
    cursor: pointer;
}
</style>
