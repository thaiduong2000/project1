import User from '../../views/user/List'
import Create from '../../views/user/Create'
import Update from '../../views/user/Update'

const Layout = {
  template: "<router-view />",
};

const userRoutes =
{
  path: '/users',
  name: 'user',
  component: Layout,
  children: [
    {
      path: "",
      name: "ListUser",
      component: User,
    },
    {
      path: "create",
      name: "CreateUser",
      component: Create,
    },
    {
      path: "update",
      name: "UpdateUser",
      component: Update,
    },
  ],
}

export default userRoutes;