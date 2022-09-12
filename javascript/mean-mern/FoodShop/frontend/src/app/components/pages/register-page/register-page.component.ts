import { Component, OnInit } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { ActivatedRoute, Router } from "@angular/router";
import { UserService } from "src/app/services/user.service";
import { IUserRegister } from "src/app/shared/models/interfaces/IUserRegister";
import { PasswordsMatchValidator } from "src/app/shared/models/validators/password_match_validators";

@Component({
  selector: "app-register-page",
  templateUrl: "./register-page.component.html",
  styleUrls: ["./register-page.component.css"],
})
export class RegisterPageComponent implements OnInit {
  registerForm!: FormGroup;
  isSubmitted = false;
  returnUrl = "";
  constructor(
    private formBuilder: FormBuilder,
    private userService: UserService,
    private activatedRouter: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.registerForm = this.formBuilder.group(
      {
        name: ["", [Validators.required, Validators.minLength(5)]],
        email: ["", [Validators.required, Validators.email]],
        password: ["", [Validators.required, Validators.email]],
        confirmPassword: ["", Validators.required],
        address: ["", Validators.required, Validators.minLength(10)],
      },
      {
        validators: PasswordsMatchValidator("password", "confirmPassword"),
      }
    );
    this.returnUrl = this.activatedRouter.snapshot.queryParams.returnUrl;
  }

  get fc() {
    return this.registerForm.controls;
  }
  submit() {
    this.isSubmitted = true;
    if (this.registerForm.invalid) return;

    const values = this.registerForm.value;
    const user: IUserRegister = {
      name: values.name,
      email: values.email,
      password: values.password,
      confirmPassword: values.confirmPassword,
      address: values.address,
    };
    this.userService.register(user).subscribe((_) => {
      this.router.navigateByUrl(this.returnUrl);
    });
  }
}
