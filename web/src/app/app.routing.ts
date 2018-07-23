import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// Layouts
import { FullLayoutComponent } from './layouts/full-layout.component';
import { SimpleLayoutComponent } from './layouts/simple-layout.component';

export const routes: Routes = [
  {
    path: '',
    redirectTo: 'user/login',
    pathMatch: 'full',
  },
  {
    path: '',
    component: FullLayoutComponent,
    data: {
      title: 'Home'
    },
    children: [
        {
            path: 'dashboard',
            loadChildren: './dashboard/dashboard.module#DashboardModule'
        },
        {
            path: 'cadastro/secretfriend',
            loadChildren: './cadastro/secretfriend/secretfriend.module#SecretfriendModule',
        },
        {
            path: 'cadastro/participant',
            loadChildren: './cadastro/participant/participant.module#ParticipantModule',
        },
        {
            path: 'cadastro/users',
            loadChildren: './cadastro/users/users.module#UsersModule',
        },
        {
            path: 'user',
            loadChildren: './user/user.module#UserModule',
        }
    ]
  },
  {
    path: 'pages',
    component: SimpleLayoutComponent,
    data: {
      title: 'Pages'
    },
    children: [
      {
        path: '',
        loadChildren: './pages/pages.module#PagesModule',
      }
    ]
  }
];

@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [ RouterModule ]
})
export class AppRoutingModule {}
