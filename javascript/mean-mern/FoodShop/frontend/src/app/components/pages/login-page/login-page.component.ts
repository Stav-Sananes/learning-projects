import { Component, OnInit } from "@angular/core";
import { FormGroup, FormBuilder, Validators } from "@angular/forms";
import { ActivatedRoute, Route } from "@angular/router";
import { UserService } from "src/app/services/user.service";
@Component({
  selector: "app-login-page",
  templateUrl: "./login-page.component.html",
  styleUrls: ["./login-page.component.css"],
})
export class LoginPageComponent implements OnInit {
  loginForm!: FormGroup;
  isSubmitted = false;
  returnUrl = ''
  constructor(private formBuilder: FormBuilder,private userSerivce:UserService,private activatedRoute:ActivatedRoute,private router:Route) {}

  ngOnInit(): void {
    this.loginForm = this.formBuilder.group({
      email: ["", [Validators.required, Validators.email]],
      password: ["", Validators.required],
    });
    this.returnUrl = this.activatedRoute.snapshot.queryParams.returnUrl
  }
  get formControls() {
    return this.loginForm.controls;
  }
  submit() {
    this.isSubmitted = true;
    if (this.loginForm.invalid) return;
    alert(`email:${this.formControls.email.value},
    password: ${this.formControls.password.value}`)

    this.userSerivce.login({
      email:this.formControls.email.value,
      password:this.formControls.password.value
    }).subscribe(()=>{
      this.router.navigateByUrl(this.returnUrl)
    })
  
}

