import { NgModule } from '@angular/core';

import { ThemeModule } from '../@theme/theme.module';

import { AuthRoutingModule } from "./auth-routing.module";


@NgModule({
  imports: [
    ThemeModule,
      AuthRoutingModule
  ],
  declarations: [
  ],
})
export class AuthModule { }
