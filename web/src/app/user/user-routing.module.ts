import { NgModule } from '@angular/core';
import { Routes,
    RouterModule } from '@angular/router';
import { LoginComponent } from "./components/login.component";
import { LogoutComponent} from "./components/logout.component";
import { RegistryComponent } from "./components/registry.component"

const routes: Routes = [
    {
        path: '',
        data: {
            title: 'Users'
        },
        children: [
            {
                path: 'login',
                component: LoginComponent,
                data: {
                    title: 'Login'
                }
            },
            {
                path: 'logout',
                component: LogoutComponent,
                data: {
                    title: 'Logout'

                }
            },
            {
                path: 'registry',
                component: RegistryComponent,
                data: {
                    title: 'Registre-se'

                }
            }
        ]
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class UserRoutingModule {}
